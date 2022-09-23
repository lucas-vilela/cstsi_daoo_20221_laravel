<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use App\Models\Foto;
use App\Models\Produto;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page');
        $request->query('per_page');
        $results = Produto::with('fornecedor')
            ->paginate($perPage)
            ->appends([
                'per_page' => $perPage
            ]);
        return response()->json($results);
    }

    public function show($id)
    {
        try {
            return response()->json(Produto::findOrfail($id));
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "O produto com id:$id não foi encontrado!",
                'Exception' => $error->getMessage()
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function store(ProdutoRequest $request)
    {
        try {
            $newProduto = $request->all();
            $newProduto['importado'] = $request->importado ? true : false;

            $produto = Produto::create($newProduto);

            return response()->json([
                'msg' => 'Produto inserido com sucesso!',
                'produto' => $produto,
                'fotos' =>  $this->uploadFoto($produto, $request)
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao inserir novo produto!",
                'Exception' => $error->getMessage()
            ];

            if ($error instanceof QueryException)
                $statusHttp = 500;
            else $statusHttp = 400;
            return response()->json($responseError, $statusHttp);
        }
    }

    private function uploadFoto($produto, $request)
    {
        $fotos = [];
        if ($produto && $request->hasFile('foto')) {
            $file = $request->file('foto');
            if (is_array($file))
                foreach ($file as $image)
                    $fotos[] = $this->saveFoto($image, $produto);
            else $fotos[] = $this->saveFoto($file, $produto);
        }
        return $fotos;
    }

    private function saveFoto($file, $produto)
    {
        $folder = $produto->hash();
        $filename = $file->hashName();
        $path = $file->storeAs("fotos/produtos/".$folder, $filename, 'public');
        return Foto::create([
            'url' => asset('storage/' . $path),
            'filename' => $filename,
            'path'=> $path,
            'id_produto' => $produto->id
        ]);
    }


    public function update(ProdutoRequest $request, $id)
    {
        try {
            $newProduto = Produto::findOrfail($id);
            $newProduto->update($request->all());
            return response()->json([
                'msg' => 'Produto atualizado com sucesso!',
                'produto' => $newProduto
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao atualizar produto!",
                'Exception' => $error->getMessage()
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function remove($id)
    {
        try {
            if (Produto::findOrfail($id)->delete())
                return response()->json([
                    "msg" => "Produto com id:$id removido!"
                ]);
            else throw new Exception("Erro ao deletar produto com id:$id.");
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "O produto com id:$id não foi removido!",
                'Exception' => $error->getMessage()
            ];
            $statusHttp = 500;
            return response()->json($responseError, $statusHttp);
        }
    }
}
