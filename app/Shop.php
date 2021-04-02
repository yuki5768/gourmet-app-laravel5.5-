<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model {
	protected $fillable = ['shop_id', 'name', 'address', 'station_name', 'logo_image', 'token'];
}
