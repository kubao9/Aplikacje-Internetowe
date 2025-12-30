<?php

$conf->debug = true;
$conf->protocol = 'http';
$conf->server_name = 'localhost';

$conf->app_root = '/rooms/public';


// --- baza danych (MySQL)
$conf->db_type = 'mysql';
$conf->db_server = '127.0.0.1';
$conf->db_name = 'NAZWA_BAZY_DANYCH';
$conf->db_user = 'NAZWA_UZYTKOWNIKA_BAZY_DANYCH';
$conf->db_pass = 'TAJNE_HASLO_DO_BAZY_DANYCH';
$conf->db_charset = 'utf8mb4';
$conf->db_port = '3306';

// opcjonalnie PDO options:
$conf->db_option = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
