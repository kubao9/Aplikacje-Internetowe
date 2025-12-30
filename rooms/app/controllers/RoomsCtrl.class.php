<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\Validator;
use core\SessionUtils;

class RoomsCtrl {

    public function action_roomsAdmin() {
        $rooms = App::getDB()->select('rooms', ['id','name','capacity'], ['ORDER' => ['name' => 'ASC']]);
        App::getSmarty()->assign('rooms', $rooms);
        App::getSmarty()->display('RoomsAdmin.tpl');
    }

    public function action_roomAdd() {
        $v = new Validator();

        $name = $v->validateFromPost('name', [
            'trim' => true, 'required' => true, 'min_length' => 2, 'max_length' => 128
        ]);

        $cap = $v->validateFromPost('capacity', [
            'required' => true, 'int' => true, 'min' => 1, 'max' => 10000
        ]);

        if (!App::getMessages()->isError()) {
            try {
                App::getDB()->insert('rooms', ['name' => $name, 'capacity' => (int)$cap]);
                Utils::addInfoMessage('Dodano salę.');
            } catch (\Exception $e) {
                Utils::addErrorMessage('Nie udało się dodać sali (może już istnieje).');
            }
        }

        SessionUtils::storeMessages();
        header("Location: " . App::getConf()->action_root . "roomsAdmin");
        exit;
    }

    
    public function action_roomDelete() {
        $v = new \core\Validator();

        $id = $v->validateFromCleanURL(1, [
            'required' => true,
            'int' => true,
            'min' => 1,
            'required_message' => "Parametr 'id' jest wymagany",
            'validator_message' => "Niepoprawne 'id'"
        ]);

        if (!\core\App::getMessages()->isError()) {
            \core\App::getDB()->delete('rooms', ['id' => (int)$id]);
            \core\Utils::addInfoMessage('Usunięto salę.');
        }

        \core\SessionUtils::storeMessages();
        header("Location: " . \core\App::getConf()->action_root . "roomsAdmin");
        exit;
    }

}
