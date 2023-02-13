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
        Schema::create('infants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregnancy_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender'); // male or female
            $table->dateTime('date_of_birth');
            $table->string('remarks');
            $table->string('status'); // alive or deceased
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
        Schema::dropIfExists('infants');
    }
};
