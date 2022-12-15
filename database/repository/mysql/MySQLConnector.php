<?php

$url = "localhost";
$user = "root";
$password = "";
$databaseName = "zadatak_1";

$db = new mysqli($url, $user, $password, $databaseName);

if ($db->connect_errno) {
    die("Unable to establish connection with database".$db->connect_error);
}
$db->set_charset("utf8");
$db->autocommit(false);