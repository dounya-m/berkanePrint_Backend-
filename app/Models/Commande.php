<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $table = 'commande';
    protected $primaryKey = 'id_commande';

    protected $fillable = [
        'client_name',
        'date_commande',
        'designation',
        'prix_unitaire',
        'quantite',
        'total',
        'net_payer',
        'montant_payer',
        'reste',
        'type_paiement',
        'date_livraison',
        'remarque',
    ];
}
