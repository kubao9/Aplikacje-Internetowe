<?php
require_once dirname(__FILE__) . '/../config.php';

$kwota = $_REQUEST['kwota'] ?? null;
$lata = $_REQUEST['lata'] ?? null;
$oprocentowanie = $_REQUEST['oprocentowanie'] ?? null;

$messages = [];

if (!isset($kwota, $lata, $oprocentowanie)) {
    $messages[] = 'Nieprawidłowe wywołanie aplikacji (brak parametrów).';
}

if ($kwota === "") $messages[] = 'Nie podano kwoty kredytu.';
if ($lata === "") $messages[] = 'Nie podano liczby lat.';
if ($oprocentowanie === "") $messages[] = 'Nie podano oprocentowania.';

if (empty($messages)) {
    if (!is_numeric($kwota)) $messages[] = 'Kwota kredytu musi być liczbą.';
    if (!is_numeric($lata)) $messages[] = 'Liczba lat musi być liczbą.';
    if (!is_numeric($oprocentowanie)) $messages[] = 'Oprocentowanie musi być liczbą.';
}

if (empty($messages)) {
    $kwota = floatval($kwota);
    $lata = floatval($lata);
    $oprocentowanie = floatval($oprocentowanie);

    // liczba rat
    $n = $lata * 12;
    // miesięczna stopa procentowa
    $r = $oprocentowanie / 100 / 12;

    // wzór na ratę stałą
    if ($r == 0) {
        $rata = $kwota / $n;
    } else {
        $rata = $kwota * ($r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1);
    }

    $result = round($rata, 2);
}

include 'calc_credit_view.php';
