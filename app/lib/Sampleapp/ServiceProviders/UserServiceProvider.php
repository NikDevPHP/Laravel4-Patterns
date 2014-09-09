<?php namespace Sampleapp\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use Sampleapp\Repositories\EloquentUserRepository;

class UserServiceProvider extends ServiceProvider {

	public function register()
	{
		// Bind the user repository interface to our Eloquent-specific implementation
		// This service provider is called every time the application starts
		$this->app->bind(
			'Sampleapp\Repositories\User\UserRepository',
			'Sampleapp\Repositories\User\EloquentUserRepository'
		);
	}

}
