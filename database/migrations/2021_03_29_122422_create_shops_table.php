<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration {
	public function up() {
		Schema::create('shops', function (Blueprint $table) {
			$table->increments('id');
			$table->string('shop_id');
			$table->string('name');
			$table->string('address');
			$table->string('station_name');
			$table->string('logo_name');
			$table->string('token');
			$table->timestamps();
		});
	}

	public function down() {
		Schema::dropIfExists('shops');
	}
}
