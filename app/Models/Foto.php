<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'filename',
        'path',
        'id_produto'
    ];

    public function produto(){
        return $this->belongsTo(Produto::class,'id_produto');
    }
}
