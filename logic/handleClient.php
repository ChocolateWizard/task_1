<?php
require_once("./Controller.php");
if (isset($_POST['request'])) {
    $request = $_POST['request'];
    try {
        switch ($request) {
            case "register":
                handleRegistration($_POST);
                break;
            case "login":
                handleLogin($_POST);
                break;
            case "forgot":
                handleForgotPassword($_POST);
                break;
            default:
                print_r("Invalid action");
        }
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

function handleRegistration($data)
{
    $firstName = $data['firstName'];
    $lastName = $data['lastName'];
    $email = $data['email'];
    $username = $data['username'];
    $password = $data['password'];
    $placeId = $data['placeId'];

    $controller = new Controller();
    $controller->registerUser($firstName, $lastName, $email, $username, $password, $placeId);
    echo "Accout successfully created";
}
function handleLogin($data)
{
    session_start();
    $username = $data['username'];
    $password = $data['password'];
    $controller = new Controller();
    $user=$controller->loginUser($username, $password);
    $_SESSION['username']=$user->get_username();
    echo "Login successfull";   
}
function handleForgotPassword($data)
{
}
