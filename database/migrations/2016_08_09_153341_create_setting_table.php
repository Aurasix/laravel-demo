<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Config;

class CreateSettingTable extends Migration
{
	public function __construct()
	{
		$this->tablename = Config::get('settings.db_table');
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->tablename, function(Blueprint $table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('setting_key', 100)->index()->unique('key');
			$table->text('setting_value', 65535)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($this->tablename);
	}
}
