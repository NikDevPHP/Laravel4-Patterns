<?php

/**
 * This is a API based example so all the URL's are prefixed with 'api'
 * To create a user the final URL will be : 'api/user/create'
 *
 * Since I am using the Laravel Route::controller the method will be
 * called 'getCreate' in the file 'app/controllers/UserController.php'.
 * I am using the GET request to create a user for this demo. You should
 * always use a POST request in your application to create user.
 */

Route::group(array('prefix' => 'api'), function()
{
	Route::controller('user', 'UserController');
});
