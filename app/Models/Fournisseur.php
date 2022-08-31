<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $table = 'fournisseur';
    protected $primaryKey = 'id';

    protected $fillable = [
        'fournisseur_name',
        'fournisseur_society',
        'fournisseur_email',
        'fournisseur_adresse',
        'fournisseur_phone',
        'fournisseur_fix',
    ];
}
