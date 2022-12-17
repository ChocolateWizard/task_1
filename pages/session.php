<?php
session_start();
require_once("../logic/Controller.php");
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}
$user = $_SESSION['username'];
$controller = new Controller();
$dbUser = $controller->getUser($user);

