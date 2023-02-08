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
            $table->integer('quantite')->nullable();
            $table->double('total_ht')->nullable();
            $table->double('total_taxe')->nullable();
            $table->double('total_livraison')->nullable();
            $table->double('total_remise')->nullable();
            $table->double('total_ttc')->nullable();
            $table->string('livraison_prevue')->nullable();
            $table->dateTime('livraison_exacte')->nullable();
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
