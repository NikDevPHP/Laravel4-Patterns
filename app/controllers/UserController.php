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

	/**
	  * Create a new resource in storage.
	  *
	  * @return Response
	  */
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

}
