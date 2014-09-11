## Laravel - Patterns demo application

Basic template for laravel 4 applications using Gateways, Repositories, Service Providers and Validaion Service.

Full version of this template is now avaiable : https://github.com/octabrain/Laravel4-Patterns-Full

### Includes the following patterns

* Gateways
* Repositories
* Service Providers
* Validation Service
* Presenter

Inspired by :

https://github.com/seeARMS/laravel-repository-gateway

Reference :

http://stackoverflow.com/questions/18817615/managing-relationships-in-laravel-adhering-to-the-repository-pattern

http://stackoverflow.com/questions/18817615/managing-relationships-in-laravel-adhering-to-the-repository-pattern

http://culttt.com/2013/07/29/creating-laravel-4-validation-services/

http://culttt.com/2014/01/20/extending-laravel-4-validator/

http://culttt.com/2013/07/08/creating-flexible-controllers-in-laravel-4-using-repositories/

### Laravel Packages used

1. ShawnMcCool - laravel-auto-presenter - version 2.2 - MIT License

	https://github.com/ShawnMcCool/laravel-auto-presenter/tree/2.2

### How everthing fits together

                  (CustomValidator)
               Custom Validation Rules
                          |
                          V
             (ValidationServiceProvider)
                  Service Providers
                          |
                          V
         (Service\Validator\UserValidator)             (UserServiceProvider)  (UserPresenter)
                Service\Validator                        Service Providers       Presenter
                          +                                      |                   |
                    (UserGateway)                                V                   V
    Controller ------> Gateway -------> Repository 1 ---> Eloquent Repository ---> Model 1 ---> DB Table
    (UserController)      |          (UserRespository) (EloquentUserRepository)    (User)       (users)
                          |
                          ------------> Repository 2 ---> Eloquent Repository ---> Model 2 ---> DB Table
                          |
                          ------------> Repository n ---> Eloquent Repository ---> Model n ---> DB Table


### How to use it

#### Step 1

Edit the composer.json file inside the laravel 4 root directory and
add the following lines to "require" and "classmap" section :

	"require": {
		...
		"mccool/laravel-auto-presenter": "~2.2"
	},

	"autoload": {
		"classmap": [
			......
			"app/lib"
		],
	},

#### Step 2

Add the following lines in app/config/app.php to the 'providers' array

	'McCool\LaravelAutoPresenter\LaravelAutoPresenterServiceProvider',
	'Sampleapp\ServiceProviders\ValidationServiceProvider',
	'Sampleapp\ServiceProviders\UserServiceProvider'

Note : All the changed files are included in this repository.

#### Step 3

From the console run

	$composer update
	$composer dump-autoload -o

#### Step 4

Create a database with following structure :

	CREATE TABLE IF NOT EXISTS users (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`username` varchar(255) NOT NULL,
		`updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

Add the database configuration to the app/config/database.php

Add some dummy data also.

#### Test

Make a POST request to the URL http://<your-laravel-url>/public/api/user/create

	$curl -X POST http://<your-laravel-url>/public/api/user/create

This request should fail with hex validation error.

Remove the 'hex' rule from app/lib/Sampleapp/Services/Validators/UserValidator.php

	$curl -X POST http://<your-laravel-url>/public/api/user/create

This request should succeed.

Make a GET request to the URL http://public/api/user/index

	$curl -X GET http://<your-laravel-url>/public/api/user/index

This request should succeed.

### License

The MIT License (MIT)

Copyright (c) 2014 https://github.com/octabrain

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
