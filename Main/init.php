<?php
require_once 'config.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Sao_Paulo');

function db_connect() {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
    }
}