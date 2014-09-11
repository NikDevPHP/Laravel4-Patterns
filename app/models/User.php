<?php

class User extends Eloquent implements \Robbo\Presenter\PresentableInterface {

	protected $table = 'users';

	protected $fillable = array('username');

	public function getPresenter()
	{
		return new Sampleapp\Presenters\UserPresenter($this);
	}
}
