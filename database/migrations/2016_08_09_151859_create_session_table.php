<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('userId')->unsigned();
            $table->string('token');
            $table->string('ipAddress', 45);
            $table->text('userAgent');
            $table->string('browserName', 50);
            $table->string('browserVersion', 25);
            $table->string('deviceModel', 50);
            $table->string('deviceType', 50);
            $table->string('deviceVendor', 50);
            $table->string('engineName', 50);
            $table->string('engineVersion', 25);
            $table->string('osName', 50);
            $table->string('osVersion', 25);
            $table->string('cpuArchitecture', 50);

            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
            $table->timestamp('deletedAt')->nullable();
            $table->boolean('state')->default(0);

            $table->foreign('userId')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('session');
    }
}
