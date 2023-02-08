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
        Schema::create('commande_produit', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite')->nullable();
            $table->double('prix_unitaire')->nullable();

            $table->foreignId('commande_id')
            ->nullable()
            ->constrained('commandes')
            ->onUpdate('cascade')
            ->onDelete('set null');

            $table->foreignId('produit_id')
            ->nullable()
            ->constrained('produits')
            ->onUpdate('cascade')
            ->onDelete('set null');


            $table->softDeletes();
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
        Schema::dropIfExists('commande_produit');
    }
};
