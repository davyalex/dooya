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
        Schema::create('publicites', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->foreignId('section_id')
            ->nullable()
            ->constrained('sections')
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
        Schema::dropIfExists('publicites');
    }
};
