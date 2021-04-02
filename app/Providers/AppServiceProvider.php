<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	public function boot() {
		//
		\Illuminate\Support\Facades\Schema::defaultStringLength(191);
	}

	public function register() {
	}
}
