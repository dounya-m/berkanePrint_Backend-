<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;
    protected $table = 'catalogue';
    protected $primaryKey = 'id_catalogue';

    protected $fillable = [
        'categorie',
        'categorie_child',
        'title',
        'contente',
        'image',
    ];
}
