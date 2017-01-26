<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language', function(Blueprint $table)
        {
            $table->string('language_id', 5)->primary();
            $table->string('language', 3);
            $table->string('country', 3);
            $table->string('name', 32);
            $table->string('name_ascii', 32);
            $table->boolean('status');
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('language');
    }
}
