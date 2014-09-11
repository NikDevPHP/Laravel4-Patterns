<?php namespace Sampleapp\ServiceProviders;

/* Reference : http://culttt.com/2014/01/20/extending-laravel-4-validator */

use Illuminate\Support\ServiceProvider;
use Sampleapp\Extensions\Validation\CustomValidator;

class ValidationServiceProvider extends ServiceProvider {

        public function register() {}

        public function boot()
        {
                $this->app->validator->resolver(function($translator, $data, $rules, $messages)
                {
                        return new CustomValidator($translator, $data, $rules, $messages);
                });
        }

}
