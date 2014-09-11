<?php namespace Sampleapp\Extensions\Validation;

/* Reference : http://culttt.com/2014/01/20/extending-laravel-4-validator */

class CustomValidator extends \Illuminate\Validation\Validator {

        /**
         * Custom validation rule, which is used as 'hex' in the application
         * See how it is used at app/lib/Sampleapp/Services/Validators/UserValidator.php
         */
        public function validateHex($attribute, $value, $parameters)
        {
                if (preg_match("/^#?([a-f0-9]{6}|[a-f0-9]{3})$/", $value))
                {
                        return true;
                }
                return false;
        }

        /* Message to show for validateHex on validation failure */
        protected function replaceHex($message, $attribute, $rule, $parameters)
        {
            return sprintf("The %s field is not a valid hex value.", $attribute);
        }
}
