<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configs', function(Blueprint $table)
		{
			$table->increments('id');
            $table->tinyInteger('category')->unsigned();
            $table->tinyInteger('perpage')->unsigned();
            $table->string('viewall');
            $table->string('readmore');
            $table->string('maps');
            $table->string('address');
            $table->string('facebook');
            $table->string('twitter');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('configs');
	}

}
