<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->integer('review_id')->primary();
            $table->integer('doctor_id')->nullable();
            $table->integer('patient_id')->nullable();
            $table->integer('rating')->nullable();
            $table->text('review_text')->nullable();
            $table->timestamp('review_date')->default(now());

            $table->foreign('doctor_id')->references('doctor_id')->on('doctors');
            $table->foreign('patient_id')->references('patient_id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
