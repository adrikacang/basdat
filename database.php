<?php

//Buka config.php dulu
include 'config.php';

//Koneksi ke server
try {
	$db = new PDO("psql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    echo $e->getMessage();
    die();
}
