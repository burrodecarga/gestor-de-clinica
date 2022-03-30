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
        Schema::create('medicine_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interview_id')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->unsignedBigInteger('medicine_id')->nullable();
            $table->text('instruction')->nullable();
            $table->string('dosage')->nullable();
            $table->foreign('medicine_id')->references('id')->on('medicines')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('medicine_user');
    }
};
