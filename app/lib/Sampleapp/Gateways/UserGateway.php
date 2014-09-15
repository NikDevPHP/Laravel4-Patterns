<?php namespace Sampleapp\Gateways;

/**
 * This is the User Gateway. If you need to access more than one
 * model, you can do this here. This also handles all your validations.
 * Pretty neat, controller doesnt have to know how this gateway will
 * create the resource and do the validation. Also model just saves the
 * data and is not concerned with the validation.
 */

use Sampleapp\Repositories\User\UserRepository;
use Sampleapp\Services\Validators\UserValidator;

class UserGateway {

	protected $userRepository;

	protected $userValidator;

	public function __construct(UserRepository $userRepository, UserValidator $userValidator) {
		$this->userRepository = $userRepository;
		$this->userValidator = $userValidator;
	}

	public function createUser($input) {

		/**
		 * User Validation is done here in the gateway
		 *
		 * For rules see app/lib/Sampleapp/Services/Validators/UserValidator.php
		 */
		$this->userValidator->with($input);

		if ($this->userValidator->passes()) {
			if ($this->userRepository->create($input)) {
				return array('status' => 'success');
			} else {
				return array('status' => 'error', 'message' => 'Failed to create');
			}
		}

		/**
		 * NOTE : if you need to access more than one model do this here, All your business
		 * logic and validation is handled by this gateway.
		 */

		/* Return validation errors to the controller */
		return array('status' => 'error', 'message' => $this->userValidator->getErrors());
	}

}
