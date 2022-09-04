<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stock';
    protected $primaryKey = 'id_stock';

    protected $fillable = [
        'type',
        'sous_type',
        'format',
        'gramage',
        'unite',

    ];
}
