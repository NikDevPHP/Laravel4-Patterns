<?php namespace Sampleapp\Repositories;

use User;

class EloquentUserRepository extends BaseRepository implements UserRepository {

        protected $user;

        public function __construct(User $user)
        {
                parent::__construct($user);
                $this->user = $user;
        }

        public function create(array $data)
        {
                return $this->user->create($data);
        }
}
