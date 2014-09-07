<?php namespace Sampleapp\Gateways;

use Sampleapp\Repositories\UserRepository;
use Sampleapp\ServiceProviders\Validators;

class UserGateway {

	protected $userRepository;

	public function __construct(UserRepository $userRepository) {
		$this->userRepository = $userRepository;
	}

	public function createUser($input) {
		// TODO : How to do validation ??
		return $this->userRepository->create($input);
	}

}
