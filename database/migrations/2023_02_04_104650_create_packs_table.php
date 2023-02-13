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
        Schema::create('packs', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->double('prix')->nullable();
            $table->double('prix_promo')->nullable();
            $table->date('date_debut_promo')->nullable();
            $table->date('date_fin_promo')->nullable();
            $table->integer('stock')->nullable();
            $table->string('disponibilite')->nullable(); //select(disponible, rupture)
            $table->longText('description')->nullable();
            $table->integer('promotion')->default(0)->nullable();

            $table->softDeletes();
            $table->timestamps();


            $table->foreignId('category_pack_id')
            ->nullable()
            ->constrained('category_packs')
            ->onUpdate('cascade')
            ->onDelete('set null');

            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packs');
    }
};
