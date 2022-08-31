<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande', function (Blueprint $table) {

            $table->id('id_commande')->uniqid();
            $table->string('client_name');
            $table->string('date_commande');
            $table->string('designation');
            $table->float('prix_unitaire');
            $table->float('quantite');
            $table->float('total');
            $table->float('net_payer');
            $table->float('montant_payer');
            $table->float('reste');
            $table->string('type_paiement');
            $table->string('date_livraison');
            $table->string('remarque');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande');
    }
};
