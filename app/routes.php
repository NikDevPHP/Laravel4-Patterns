<?php

/**
 * This is a API based example so all the URL's are prefixed with 'api'
 * To create a user the final URL will be : 'api/user/create'
 *
 * Since I am using the Laravel Route::controller the method will be
 * called 'postCreate' in the file 'app/controllers/UserController.php'.
 */

Route::group(array('prefix' => 'api'), function()
{
	Route::controller('user', 'UserController');
});
