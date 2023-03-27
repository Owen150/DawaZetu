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
        Schema::create('invoice_proformas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('financial_year_id');
            $table->unsignedBigInteger('facility_id');
            $table->integer('total');
            $table->string('status');
            $table->string('lpo');
            $table->boolean('approved_for_supply');
            $table->foreign('financial_year_id')->references('id')->on('financial_years');
            $table->foreign('facility_id')->references('id')->on('facilities');
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
        Schema::dropIfExists('invoice_proformas');
    }
};
