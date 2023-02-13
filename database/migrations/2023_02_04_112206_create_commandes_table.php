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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('description')->nullable();
            $table->integer('nombre_produit')->nullable();
            $table->double('sous_total')->nullable();
            $table->double('taxe')->nullable();
            $table->double('tarif_livraison')->nullable();
            $table->double('remise')->nullable();
            $table->double('montant_total')->nullable();
            $table->dateTime('livraison_prevue')->nullable();
            $table->dateTime('livraison_exacte')->nullable();
            $table->text('livraison_precis')->nullable();
            $table->string('status')->nullable(); // attente", en cour ,livré

            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('set null');

            $table->foreignId('livraison_id')
            ->nullable()
            ->constrained('livraisons')
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
        Schema::dropIfExists('commandes');
    }
};
