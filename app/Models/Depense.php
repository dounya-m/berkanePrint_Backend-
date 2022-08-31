<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;

    protected $table = 'depense';
    protected $primaryKey = 'id_dep';

    protected $fillable = [
        'id_cmd',
        'nom_fournisseure',
        'date_dep',
        'designation',
        'prix',
        'quantite',
        'total',
        'net',
        'montant_payer',
        'reste',
        'type_paiement',
        'date_livraison',
        'remarque',
    ];
}
