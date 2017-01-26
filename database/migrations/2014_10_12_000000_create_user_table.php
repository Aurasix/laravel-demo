<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('slug');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role');
            $table->boolean('activated')->default(0);
            $table->string('activationCode', 16)->nullable();
            $table->string('address')->nullable();
            $table->text('aboutMe')->nullable();
            $table->string('gender', 6)->nullable();
            $table->timestamp('birthdate')->nullable();
            $table->string('photo')->nullable();
            $table->string('phone', 64)->nullable();
            $table->string('mobilePhone', 64)->nullable();
            $table->string('facebookUrl', 1020)->nullable();
            $table->string('twitterUrl', 1020)->nullable();
            $table->string('googlePlusUrl', 1020)->nullable();
            $table->boolean('receiveNews')->default(0);

            $table->rememberToken();
            $table->string('createdBy');
            $table->string('createdIp', 45);
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
            $table->string('updatedIp', 45);
            $table->string('updatedBy');
            $table->timestamp('deletedAt')->nullable();
            $table->boolean('state')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
