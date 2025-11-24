<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('hello'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('hello', 'HelloCtrl');
//Utils::addRoute('action_name', 'controller_class_name');

Utils::addRoute('credit', 'CreditCtrl');   // pokazanie formularza
Utils::addRoute('calc', 'CalcCtrl');       // obsługa obliczeń
