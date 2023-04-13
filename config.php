<?php
session_start();

try {
    $pdo = new PDO("mysql:dbname=anuncieaqui;host=localhost", "root", "");
} catch (PDOException $e) {
    echo "FALHOU " . $e->getMessage();
    exit;
}
