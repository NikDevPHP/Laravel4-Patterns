<?php namespace Sampleapp\Presenters;

class UserPresenter extends \Robbo\Presenter\Presenter {

        public function presentUserinfo()
        {
                return 'User Info : ' . 'id=' .$this->id . ' & username=' . $this->username;
        }

}
