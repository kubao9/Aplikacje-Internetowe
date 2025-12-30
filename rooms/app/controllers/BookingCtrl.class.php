<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\Validator;
use core\SessionUtils;

class BookingCtrl {

    private function currentUser() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        return $_SESSION['user'] ?? null;
    }

    public function action_rooms() {
        $me = $this->currentUser();

        $rooms = App::getDB()->select('rooms', ['id','name','capacity'], ['ORDER' => ['name' => 'ASC']]);

        $resv = App::getDB()->query(
            "SELECT r.id, r.room_id, rm.name AS room_name, r.start, r.end, r.user_id, u.username
             FROM reservations r
             JOIN rooms rm ON rm.id = r.room_id
             JOIN users u  ON u.id  = r.user_id
             ORDER BY r.start ASC"
        )->fetchAll();

        App::getSmarty()->assign('me', $me);
        App::getSmarty()->assign('rooms', $rooms);
        App::getSmarty()->assign('reservations', $resv);
        App::getSmarty()->display('BookingList.tpl');
    }

    public function action_reserve() {
        $me = $this->currentUser();

        $v = new Validator();
        $roomId = $v->validateFromPost('room_id', ['required' => true, 'int' => true, 'min' => 1]);

        $start = $v->validateFromPost('start', [
            'required' => true,
            'regexp' => '/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/'
        ]);

        $end = $v->validateFromPost('end', [
            'required' => true,
            'regexp' => '/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/'
        ]);

        if (App::getMessages()->isError()) {
            SessionUtils::storeMessages();
            header("Location: " . App::getConf()->action_root . "rooms");
            exit;
        }

        $start = str_replace('T', ' ', $start) . ':00';
        $end   = str_replace('T', ' ', $end) . ':00';

        if (strtotime($end) <= strtotime($start)) {
            Utils::addErrorMessage('Koniec musi być po początku.');
            SessionUtils::storeMessages();
            header("Location: " . App::getConf()->action_root . "rooms");
            exit;
        }

        $row = App::getDB()->query(
            "SELECT COUNT(*) AS c
             FROM reservations
             WHERE room_id = :rid
               AND NOT (`end` <= :start OR start >= :end)",
            [':rid' => (int)$roomId, ':start' => $start, ':end' => $end]
        )->fetch();

        if ((int)($row['c'] ?? 0) > 0) {
            Utils::addErrorMessage('Termin zajęty. Wybierz inny.');
        } else {
            App::getDB()->insert('reservations', [
                'room_id' => (int)$roomId,
                'user_id' => (int)$me['id'],
                'start' => $start,
                'end' => $end
            ]);
            Utils::addInfoMessage('Zarezerwowano salę.');
        }

        SessionUtils::storeMessages();
        header("Location: " . App::getConf()->action_root . "rooms");
        exit;
    }


    public function action_cancel() {
        $me = $this->currentUser();
        $v = new \core\Validator();

        $id = $v->validateFromCleanURL(1, [
            'required' => true,
            'int' => true,
            'min' => 1,
            'required_message' => "Parametr 'id' jest wymagany",
            'validator_message' => "Niepoprawne 'id'"
        ]);

        if (\core\App::getMessages()->isError()) {
            \core\SessionUtils::storeMessages();
            header("Location: " . \core\App::getConf()->action_root . "rooms");
            exit;
        }

        // admin może kasować każdą, user tylko swoją
        if ($me['role'] === 'admin') {
            \core\App::getDB()->delete('reservations', ['id' => (int)$id]);
            \core\Utils::addInfoMessage('Anulowano rezerwację.');
        } else {
            \core\App::getDB()->delete('reservations', ['AND' => [
                'id' => (int)$id,
                'user_id' => (int)$me['id']
            ]]);
            \core\Utils::addInfoMessage('Anulowano Twoją rezerwację');
        }

        \core\SessionUtils::storeMessages();
        header("Location: " . \core\App::getConf()->action_root . "rooms");
        exit;
    }

}
