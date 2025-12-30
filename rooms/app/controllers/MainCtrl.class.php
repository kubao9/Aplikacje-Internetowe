<?php
namespace app\controllers;

use core\App;

class MainCtrl {
    public function action_accessdenied() {
        App::getSmarty()->display('AccessDenied.tpl');
    }
}
