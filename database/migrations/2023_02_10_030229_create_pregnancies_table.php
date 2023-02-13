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
        Schema::create('pregnancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id');
            $table->string('age_of_gestation');
            $table->integer('baby_count')->default(1);
            $table->string('birth_date')->nullable();
            $table->string('baby_status')->nullable(); 
            $table->dateTime('delivered_at')->nullable();
            $table->string('delivery_type')->nullable(); // Viginal Birth
            $table->boolean('active')->default(true);
            $table->boolean('is_recorded')->default(false);
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
        Schema::dropIfExists('pregnancies');
    }
};
