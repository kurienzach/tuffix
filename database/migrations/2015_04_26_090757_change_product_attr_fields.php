<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProductAttrFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('products', function($table)
        {
            $table->dropColumn(['sub_name', 'material']);
            $table->string('attr1_name');
            $table->string('attr1_value');
            $table->string('attr2_name');
            $table->string('attr2_value');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('products', function($table)
        {
            $table->dropColumn(['attr1_name', 'attr1_value','attr2_name', 'attr2_value']);
            $table->string('sub_name');
            $table->string('material');
        });
	}

}
