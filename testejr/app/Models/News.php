<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public $timestamps = false;

    protected $fillable = [
        'Titulo',
        'Conteudo',
        'id_autor',
        'categoria',
        'Publicado_em'
    ];

    public static function getNewsUser(int $user)
    {
        $data = News::select('news.*', 'users.name as name_autor')
        ->where('id_autor', $user)
        ->join('users', 'news.id_autor', '=', 'users.id')
        ->orderbyDesc('news.id')
        ->get();

        return $data;
    }
}
