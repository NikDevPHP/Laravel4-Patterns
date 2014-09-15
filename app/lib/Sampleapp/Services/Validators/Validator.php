<?php namespace Sampleapp\Services\Validators;

/* Reference : http://culttt.com/2013/07/29/creating-laravel-4-validation-services/ */

abstract class Validator {

        protected $input;

        protected $errors;

        public function with(array $input)
        {
                $this->input = $input;

                return $this;
        }

        public function passes()
        {
                $validation = \Validator::make($this->input, static::$rules);

                if ($validation->passes()) {
                        return true;
                }

                $this->errors = $validation->messages();
                return false;
        }

        public function getErrors()
        {
                return $this->errors;
        }

}
