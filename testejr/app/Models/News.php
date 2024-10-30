<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;

    protected $table = 'news';

    public $timestamps = false;

    protected $fillable = [
        'Titulo',
        'Conteudo',
        'autor',
        'categoria',
        'Publicado_em'
    ];
}
