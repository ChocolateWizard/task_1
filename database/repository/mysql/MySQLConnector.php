<?php

function exception_error_handler($errno, $errstr, $errfile, $errline)
{
    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
}
set_error_handler("exception_error_handler");


$url = "localhost";
$user = "root";
$password = "";
$databaseName = "zadatak_1";

$db = new mysqli($url, $user, $password, $databaseName);

if ($db->connect_errno) {
    echo "Unable to establish connection with database";
    die();
}
$db->set_charset("utf8");
$db->autocommit(false);