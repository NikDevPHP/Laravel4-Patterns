<?php

use Sampleapp\Gateways\UserGateway;

class UserController extends BaseController {

	public function __construct(UserGateway $userGateway)
	{
		$this->userGateway = $userGateway;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{

	}

	/**
	 * Create a new resource in storage.
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
			Event::fire('User.create');
		}

		return Response::json(array(
			'status' => 'error',
			'message' => $data['message'],
		));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function putUpdate($id)
	{

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteDestroy($id)
	{

	}
}
