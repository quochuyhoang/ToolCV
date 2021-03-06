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
        Schema::create('imagecvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

        });

        Schema::create('colors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('colorcv', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('imagecv_id')->unsigned();
            $table
                ->foreign('imagecv_id')
                ->references('id')
                ->on('imagecvs')
                ->onDelete('cascade');
            $table->bigInteger('color_id')->unsigned();
            $table
                ->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('birth');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
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
            $table->integer('level');
        });


        Schema::create('user_cvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('target')->nullable();
            $table->integer('salary')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('job_name')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('user_name')->nullable();
            $table->string('user_address')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_email')->nullable();
            $table->bigInteger('colorcv_id')->unsigned();
            $table
                ->foreign('colorcv_id')
                ->references('id')
                ->on('colorcv');
        });


        Schema::create('awards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('describe')->nullable();
            $table->string('year')->nullable();
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
                ->on('user_cvs')
                ->onDelete('cascade');

        });


        Schema::create('experience', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('describe')->nullable();
            $table->string('achi')->nullable();
            $table->string('reference')->nullable();
            $table->string('rf_phone')->nullable();
            $table->string('time')->nullable();
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
                ->on('user_cvs')
                ->onDelete('cascade');
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
                ->on('user_cvs')
                ->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('spe')->nullable();
            $table->string('time')->nullable();
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
