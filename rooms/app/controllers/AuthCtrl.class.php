<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\Validator;
use core\RoleUtils;
use core\SessionUtils;

class AuthCtrl {

    public function action_login() {
        App::getSmarty()->display('Login.tpl');
    }

    public function action_loginDo() {
        $v = new Validator();

        $login = $v->validateFromPost('login', [
            'trim' => true, 'required' => true, 'min_length' => 3, 'max_length' => 64
        ]);

        $pass = $v->validateFromPost('pass', [
            'required' => true, 'min_length' => 3, 'max_length' => 128
        ]);

        if (App::getMessages()->isError()) {
            return $this->action_login();
        }

        $user = App::getDB()->get('users', ['id','username','password_hash','role'], [
            'username' => $login
        ]);

        if ($user && password_verify($pass, $user['password_hash'])) {
            if (session_status() === PHP_SESSION_NONE) session_start();
            $_SESSION['user'] = [
                'id' => (int)$user['id'],
                'username' => $user['username'],
                'role' => $user['role']
            ];

            RoleUtils::addRole($user['role']);

            Utils::addInfoMessage('Zalogowano jako: '.$user['username']);
            SessionUtils::storeMessages();

            header("Location: " . App::getConf()->action_root . "rooms");
            exit;
        }

        Utils::addErrorMessage('Błędny login lub hasło.');
        return $this->action_login();
    }

    public function action_register() {
        App::getSmarty()->display('Register.tpl');
    }

    public function action_registerDo() {
        $v = new Validator();

        $login = $v->validateFromPost('login', [
            'trim' => true, 'required' => true, 'min_length' => 3, 'max_length' => 64
        ]);

        $pass = $v->validateFromPost('pass', [
            'required' => true, 'min_length' => 4, 'max_length' => 128
        ]);

        if (App::getMessages()->isError()) {
            return $this->action_register();
        }

        if (App::getDB()->has('users', ['username' => $login])) {
            \core\Utils::addErrorMessage('Taki login już istnieje.');
            return $this->action_register();
        }

        App::getDB()->insert('users', [
            'username' => $login,
            'password_hash' => password_hash($pass, PASSWORD_DEFAULT),
            'role' => 'user'
        ]);

        Utils::addInfoMessage('Konto utworzone. Zaloguj się.');
        SessionUtils::storeMessages();
        header("Location: " . App::getConf()->action_root . "login");
        exit;
    }

    public function action_logout() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $_SESSION = [];
        session_destroy();

        header("Location: " . App::getConf()->action_root . "login");
        exit;
    }
}
