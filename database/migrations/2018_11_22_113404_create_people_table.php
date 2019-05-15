<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('name_id')->unsigned();
            $table->integer('barangay_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->integer('civil_status_id')->unsigned();
            $table->string('house_street');
            $table->string('date_birth');
            $table->string('occupation');
            $table->string('image');
            $table->timestamps();
            $table->foreign('name_id')->references('id')->on('names');
            $table->foreign('barangay_id')->references('id')->on('barangays');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('civil_status_id')->references('id')->on('civil_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
