
<?php
use core\App;
use core\Utils;

// domyślna akcja
App::getRouter()->setDefaultRoute('login');

// gdzie przekierować jeśli brak uprawnień / brak roli
App::getRouter()->setLoginRoute('accessdenied');

// publiczne
Utils::addRoute('login', 'AuthCtrl');
Utils::addRoute('loginDo', 'AuthCtrl');
Utils::addRoute('logout', 'AuthCtrl');
Utils::addRoute('register', 'AuthCtrl');
Utils::addRoute('registerDo', 'AuthCtrl');

Utils::addRoute('accessdenied', 'MainCtrl');

// chronione (user i admin)
Utils::addRoute('rooms', 'BookingCtrl', ['user', 'admin']);
Utils::addRoute('reserve', 'BookingCtrl', ['user', 'admin']);
Utils::addRoute('cancel', 'BookingCtrl', ['user', 'admin']);

// tylko admin
Utils::addRoute('roomsAdmin', 'RoomsCtrl', ['admin']);
Utils::addRoute('roomAdd', 'RoomsCtrl', ['admin']);
Utils::addRoute('roomDelete', 'RoomsCtrl', ['admin']);
