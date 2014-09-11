<?php

use McCool\LaravelAutoPresenter\PresenterInterface;

/**
 * Note : If you are not using the Presenter, then remove the
 * 'implements PresenterInterface' and getPresenter() function.
 * It should look like this without the Presenter :
 *
 * class User extends Eloquent {
 *     protected $table = 'users';
 *     protected $fillable = array('username');
 * }
 */
class User extends Eloquent implements PresenterInterface
{
	protected $table = 'users';

	protected $fillable = array('username');

	public function getPresenter()
	{
		return 'Sampleapp\Presenters\UserPresenter';
	}
}
