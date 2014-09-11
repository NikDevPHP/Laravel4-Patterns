<?php namespace Sampleapp\Repositories\User;

interface UserRepository {

        public function create(array $data);

        public function getAll();
}
