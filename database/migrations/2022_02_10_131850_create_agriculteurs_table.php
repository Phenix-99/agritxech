<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgriculteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agriculteurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('sexe');
            $table->string('age');
            $table->string('email');
            $table->string('telephone');
            $table->string('whatsapp')->nullable();
            $table->string('source')->nullable();
            $table->text('biographie')->nullable();
            $table->boolean('possede_agrix')->nullable()->default(false);
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
        Schema::dropIfExists('agriculteurs');
    }
}
