<?php

namespace app\controllers;

use core\App;

class CalcCtrl {

    public $form;
    public $msgs;
    public $result;

    public function __construct() {
        $this->form = (object)[
            'kwota' => null,
            'lata' => null,
            'oprocentowanie' => null
        ];
        $this->msgs = [];
        $this->result = null;
    }

    public function action_calc() {

        // Pobranie danych z formularza
        $this->form->kwota = $_POST['kwota'] ?? null;
        $this->form->lata = $_POST['lata'] ?? null;
        $this->form->oprocentowanie = $_POST['oprocentowanie'] ?? null;

        // Walidacja
        if ($this->form->kwota === "") $this->msgs[] = 'Nie podano kwoty kredytu.';
        if ($this->form->lata === "") $this->msgs[] = 'Nie podano liczby lat.';
        if ($this->form->oprocentowanie === "") $this->msgs[] = 'Nie podano oprocentowania.';

        if (empty($this->msgs)) {
            if (!is_numeric($this->form->kwota)) $this->msgs[] = 'Kwota kredytu musi być liczbą.';
            if (!is_numeric($this->form->lata)) $this->msgs[] = 'Liczba lat musi być liczbą.';
            if (!is_numeric($this->form->oprocentowanie)) $this->msgs[] = 'Oprocentowanie musi być liczbą.';
        }

        // Obliczenia
        if (empty($this->msgs)) {

            $kwota = floatval($this->form->kwota);
            $lata = floatval($this->form->lata);
            $oprocentowanie = floatval($this->form->oprocentowanie);

            $n = $lata * 12;
            $r = $oprocentowanie / 100 / 12;

            if ($r == 0) {
                $this->result = round($kwota / $n, 2);
            } else {
                $this->result = round($kwota * ($r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1), 2);
            }
        }

        // Przekazanie do tego samego szablonu
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->assign('msgs', $this->msgs);
        App::getSmarty()->assign('result', $this->result);

        App::getSmarty()->display('credit.tpl');
    }
}
