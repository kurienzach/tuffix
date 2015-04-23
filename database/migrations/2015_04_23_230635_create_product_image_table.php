<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_image', function(Blueprint $table)
		{
			$table->integer('id')->unsigned();
			$table->string('img_url');
			$table->timestamps();
            $table->primary(['id', 'img_url']);
			$table->foreign('id')->references('id')->on('products');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_image');
	}

}
