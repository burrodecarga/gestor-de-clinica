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
        Schema::create('social_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('social_id');
            $table->unsignedBigInteger('user_id');
            $table->string('url');
            $table->foreign('social_id')->references('id')->on('socials')
            ->onDelete('cascade')->onUpdate(('cascade'));
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate(('cascade'));

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
        Schema::dropIfExists('social_user');
    }
};
