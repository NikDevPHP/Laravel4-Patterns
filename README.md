## Laravel - Patterns demo application

Basic template for laravel 4 applications using Gateways, Repositories, Service Providers and Validaion Service.


### Includes the following patterns

* Gateways
* Repositories
* Service Providers
* Validation Service

Inspired by :

https://github.com/seeARMS/laravel-repository-gateway

Reference :

http://stackoverflow.com/questions/18817615/managing-relationships-in-laravel-adhering-to-the-repository-pattern

http://stackoverflow.com/questions/18817615/managing-relationships-in-laravel-adhering-to-the-repository-pattern

http://culttt.com/2013/07/29/creating-laravel-4-validation-services/

### How everthing fits together

                 Service\Validator                     (UserServiceProvider)
         (Service\Validator\UserValidator)               Service Providers
	                  +                                      |
                    (UserGateway)                                V
    Controller ------> Gateway -------> Repository 1 ---> Eloquent Repository ---> Model 1 ---> DB Table
    (UserController)      |          (UserRespository) (EloquentUserRepository)    (User)       (users)
			  |
                          ------------> Repository 2 ---> Eloquent Repository ---> Model 2 ---> DB Table
                          |
                          ------------> Repository n ---> Eloquent Repository ---> Model n ---> DB Table


### How to use it

#### Step 1

Edit the composer.json file inside the laravel 4 root directory and
add the following line to "classmap" section :

	"autoload": {
		"classmap": [
			......
			"app/lib"
		],
	},

#### Step 2

From the console run

	$composer dump-autoload -o


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
