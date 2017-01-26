<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('userId')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->string('photo');
            $table->text('description');

            $table->string('createdBy');
            $table->string('createdIp', 45);
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
            $table->string('updatedIp', 45);
            $table->string('updatedBy');
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
        Schema::drop('page');
    }
}
