<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = 'location';
    protected $primaryKey = 'id_location';

    protected $fillable = [
        'mois',
        'prix_loc',
        'statu',
    ];
}
