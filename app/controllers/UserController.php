<?php

/**
 * NOTE : User Controller only talks to the User Gateway, it doesnt know
 * anything about the underlying database, models, validations, etc
 * Here only the create user method is shown, you can create other RESTFUL
 * methods like index, show, update, delete, etc.
 */

use Sampleapp\Gateways\UserGateway;

class UserController extends BaseController {

	public function __construct(UserGateway $userGateway)
	{
		$this->userGateway = $userGateway;
	}

	/* Gateway - Repository - Validator Service demo method */
	public function postCreate()
	{
		/* Dummy data, use Input::all() instead in your application */
		$input = array(
			'username' => 'dummy'
		);

		/* Use the User Gateway to create the user */
		$data = $this->userGateway->createUser($input);

		/************* JSON Response ************/

		if ($data['status'] == 'success') {
			return Response::json(array(
				'status' => 'success',
				'data' => '',
			));
		}

		return Response::json(array(
			'status' => 'error',
			'message' => $data['message'],
		));
	}

	/* Presenter demo method */
	public function getIndex()
	{
		/**
		 * NOTE : This is the demo for the Presenter, hence for simplicity
		 * I am bypassing the UserGateway and directly accessing the
		 * model. You need to use the Gateway to get the users. Check
		 * the above postCreate() method on how to use a Gateway.
		 *
		 * For more info on Presenter see :
		 *
		 * https://github.com/ShawnMcCool/laravel-auto-presenter/tree/2.2
		 *
		 * app/lib/Sampleapp/Presenters/UserPresenter.php
		 * app/models/User.php
		 *
		 * Also, the laravel-auto-presenter that I am using is version 2.2,
		 * version 3.x is not compatible with this setup.
		 */
		$users = User::all();
		return View::make('users.index', compact('users'));
	}

}
