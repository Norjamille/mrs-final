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
        Schema::create('check_ups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id');
            $table->dateTime('date_at');
            $table->string('description')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->integer('age_of_gestation')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('body_mass_index')->nullable();
            $table->string('laboratory_test_done')->nullable();
            $table->string('urinalysis')->nullable();
            $table->string('complete_blood_count')->nullable();
            $table->string('blood_typing')->nullable();
            $table->string('advice_and_services')->nullable();
            $table->string('name_of_service_worker')->nullable();
            $table->dateTime('done_at')->nullable();
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
        Schema::dropIfExists('check_ups');
    }
};
