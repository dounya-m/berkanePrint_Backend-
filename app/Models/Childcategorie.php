<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childcategorie extends Model
{
    use HasFactory;
    protected $table = 'childcategories';
    protected $primaryKey = 'child_id';

    protected $fillable = [
        'categorie',
        'child_categorie',
    ];
}
