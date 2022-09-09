<?php

namespace Database\Seeders;

use App\Models\Regiao;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

//php artisan make:seeder NomeSeeder
//php artisan db:seed
class RegiaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            if (Regiao::all()->count()) {
                Log::channel('stderr')->info("O banco já possui regioes!");
                print_r(Regiao::all()->pluck('nome','id'));
                return;
            }

            $jsonUrl = 'https://raw.githubusercontent.com/chandez/Estados-Cidades-IBGE/master/json/regioes.json';
            $response = Http::get($jsonUrl);
            $regioes = $response->json()['data'];

            if (!$regioes)
                throw new \Exception("Erro ao carregar arquivo JSON de Regioes!\nURL:$jsonUrl");

            $listRegioes = [];
            foreach ($regioes as $regiao)
                $listRegioes[] = ["nome" => $regiao['Nome']];

                // [
                //     ["nome"=>"Sul"],
                //     ["nome"=>"Sudeste"],
                //     ...
                // ]

            if (!Regiao::insert($listRegioes))
                throw new \Exception("Erro ao inserir Regioes!", 1);

            Log::channel('stderr')->info("Regiões inseridas com sucesso!");
            print_r(Regiao::all()->pluck('nome','id'));
        } catch (\Exception $error) {
            throw new \Exception("Erro ao processar o seed de Regioes!\n {$error->getMessage()}");
        }
    }
}
