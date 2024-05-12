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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('nomPost');
            $table->string('pi');
            $table->string('pa');
            $table->string('dis');
            $table->string('ln');
            $table->string('ln1');
            $table->string('ln2');
            $table->string('ln3');
            $table->string('lna');
            $table->string('lna1');
            $table->string('lna2');
            $table->string('lna3');
            $table->string('tension');
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
        Schema::dropIfExists('posts');
    }
};
