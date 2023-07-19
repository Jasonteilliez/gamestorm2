<?php
$dns = 'mysql:host=localhost;dbname=teste';
$username = 'root';

$pdo = new PDO($dns, $username);
$pdo->setAttribute(PDO::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, pdo::FETCH_OBJ);
