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
	  * NOTE : This is a create new user request hence it should
	  * ALWAYS be a POST request. Just for demo I am using a GET
	  * request. You will have to rename it postCreate() in your
	  * application.
	  *
	  * @return Response
	  */
	public function getCreate()
	{
		$data = $this->userGateway->createUser(Input::all());

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
