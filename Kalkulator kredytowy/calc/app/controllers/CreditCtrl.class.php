<?php

namespace app\controllers;

use core\App;

class CreditCtrl {

    // wyświetlenie formularza
    public function action_credit() {
        App::getSmarty()->display('credit.tpl');
    }

    // uruchomienie starego calc.php
    public function action_calc() {
        include dirname(__FILE__) . '/../calc.php';
    }
}
