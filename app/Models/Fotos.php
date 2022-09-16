<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotos extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'filename',
        'id_produto'
    ];

    public function fotos(){
        return $this->belongsTo(Produto::class);
    }
}
