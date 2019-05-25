<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });
        
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('birth');
            $table->string('phone');
            $table->string('address');          
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->bigInteger('location_id')->unsigned();
            $table
                ->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('level');
            $table->timestamps();
        });


        Schema::create('user_skill', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->bigInteger('skill_id')->unsigned();
            $table
                ->foreign('skill_id')
                ->references('id')
                ->on('skills')
                ->onDelete('cascade');
        });


        Schema::create('user_cvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('target');
            $table->integer('salary');
            $table->string('hobbies');
            $table->bigInteger('user_id')->unsigned();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });


        Schema::create('awards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('describe');
            $table->string('year');
            $table->bigInteger('user_id')->unsigned();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->bigInteger('user_cv_id')->unsigned();
            $table
                ->foreign('user_cv_id')
                ->references('id')
                ->on('user_cvs');
            
        });


        Schema::create('experience', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('position');
            $table->string('describe');
            $table->string('achi');
            $table->string('time');
            $table->bigInteger('user_id')->unsigned();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->bigInteger('user_cv_id')->unsigned();
            $table
                ->foreign('user_cv_id')
                ->references('id')
                ->on('user_cvs');
        });


        Schema::create('education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->bigInteger('user_cv_id')->unsigned();
            $table
                ->foreign('user_cv_id')
                ->references('id')
                ->on('user_cvs');
            $table->string('name');
            $table->string('spe');
            $table->string('time');
        });
        Schema::create('imageCVs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

        });
        Schema::create('colors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });
        Schema::create('colorCV', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('imageCV_id')->unsigned();
            $table
                ->foreign('imageCV_id')
                ->references('id')
                ->on('imageCVs')
                ->onDelete('cascade');
            $table->bigInteger('color_id')->unsigned();
            $table
                ->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
