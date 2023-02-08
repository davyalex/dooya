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
        Schema::create('produit_section', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('section_id')->index()->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');


            $table->unsignedBigInteger('produit_id')->index()->nullable();
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');


            // $table->foreignId('section_id')
            //     ->nullable()
            //     ->constrained('sections')
            //     ->onUpdate('cascade')
            //     ->onDelete('set null');

            // $table->foreignId('produit_id')
            //     ->nullable()
            //     ->constrained('produits')
            //     ->onUpdate('cascade')
            //     ->onDelete('set null');


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
        Schema::dropIfExists('produit_section');
    }
};
