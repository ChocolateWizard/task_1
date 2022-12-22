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
            case "deleteUser":
                handleDeleteUser($_POST);
                break;
            case "changeUserPassword":
                handleChangeUserPassword($_POST);
                break;
            default:
                throw new Exception("Invalid action");
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
    $countryId = $data['countryId'];

    $controller = new Controller();
    $controller->registerUser($firstName, $lastName, $email, $username, $password, $countryId);
    echo "Accout successfully created";
}
function handleLogin($data)
{
    $username = $data['username'];
    $password = $data['password'];
    $controller = new Controller();
    $user = $controller->loginUser($username, $password);
    session_start();
    $_SESSION['username'] = $user->get_username();
    echo "Login successfull";
}
function handleForgotPassword($data)
{
    $femail = $data['femail'];
    $controller = new Controller();
    if ($controller->doesUserEmailExist($femail)) {
        $token = "aiogjrmqigrj5gt98q3jjrt8j3498tj5";
        $token = str_shuffle($token);
        $token = substr($token, 0, 10);
        $controller->setToken($femail, $token);
    } else {
        throw new Exception("Invalid email. No user with given email!");
    }
}
function handleDeleteUser($data)
{
    $userID = $data['userID'];
    $controller = new Controller();
    $controller->deleteUser($userID);
    echo "Profile successfully deleted";
}

function handleChangeUserPassword($data){
    $userID = $data['userID'];
    $newPassword=$data['password'];
    $controller = new Controller();
    $controller->changeUserPassword($userID,$newPassword);
    echo "Password successfully changed";
}