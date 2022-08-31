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
        Schema::create('fournisseur', function (Blueprint $table) {
            $table->id();
            $table->string('fournisseur_name');
            $table->string('fournisseur_society');
            $table->string('fournisseur_email');
            $table->string('fournisseur_adresse');
            $table->string('fournisseur_phone');
            $table->string('fournisseur_fix');
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
        Schema::dropIfExists('fournisseur');
    }
};
