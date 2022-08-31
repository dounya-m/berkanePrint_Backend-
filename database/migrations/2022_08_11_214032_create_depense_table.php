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
        Schema::create('depense', function (Blueprint $table) {
            $table->id('id_dep')->uniqid();
            $table->unsignedBigInteger('id_cmd');
            $table->foreign('id_cmd')->references('id_commande')->on('commande')->onDelete('cascade');
            $table->string('nom_fournisseure');
            $table->string('date_dep');
            $table->string('designation');
            $table->float('prix');
            $table->float('quantite');
            $table->float('total');
            $table->float('net');
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
        Schema::dropIfExists('depense');
    }
};
