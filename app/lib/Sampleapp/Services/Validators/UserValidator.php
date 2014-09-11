<?php namespace Sampleapp\Services\Validators;

/* Reference : http://culttt.com/2013/07/29/creating-laravel-4-validation-services/ */

/**
 * NOTE : If you want a separate validation for create and
 * update actions, create separate classes for each.
 * eg : UserCreateValidator & UserUpdateValidator
 */

class UserValidator extends Validator {

        /**
         * Validation rules for User model
         *
         * 'hex' is a custom validation rule, see
         * app/lib/Sampleapp/Extensions/Validation/CustomValidator.php
         * app/lib/Sampleapp/ServiceProviders/ValidationServiceProvider.php
         */
        public static $rules = array(
                'username' => 'hex|required',
        );

}
