<?php namespace Sampleapp\Presenters;

/* Reference : https://github.com/ShawnMcCool/laravel-auto-presenter/tree/2.2 */

use McCool\LaravelAutoPresenter\BasePresenter;
use User;

class UserPresenter extends BasePresenter
{
        public function __construct(User $user)
        {
                $this->resource = $user;
        }

        /* The username field will pass through the Presenter */
        public function username()
        {
                return 'Hello, ' . $this->resource->username . ' I am the presenter';
        }
}
