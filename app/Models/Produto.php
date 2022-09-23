<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory, \Znck\Eloquent\Traits\BelongsToThrough;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'qtd_estoque',
        'preco',
        'importado',
        'fornecedor_id'
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function regiao()
    {
        return $this->belongsToThrough(
            Regiao::class,
            [
                Estado::class,
                Fornecedor::class
            ],
            null,
            '',
            [
                Regiao::class => 'regiao_id',
                Fornecedor::class => 'fornecedor_id'
            ]
        );
    }

    public function fotos(){
        return $this->hasMany(Foto::class,'id_produto');
    }

    public function hash(){
        return substr(sha1($this->id), 35, 5);
    }
}
