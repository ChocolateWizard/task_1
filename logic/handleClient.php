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
} elseif (isset($_GET['request'])) {
    $request = $_GET['request'];
    try {
        switch ($request) {
            case "getMovieSuggestionsByTitle":
                handleGetMovieSuggestionsByTitle($_GET);
                break;
            case "getMoviesByTitle":
                handleGetMoviesByTitle($_GET);
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

function handleChangeUserPassword($data)
{
    $userID = $data['userID'];
    $newPassword = $data['password'];
    $controller = new Controller();
    $controller->changeUserPassword($userID, $newPassword);
    echo "Password successfully changed";
}

function handleGetMovieSuggestionsByTitle($data)
{
    $partialMovieTitle = $data['movieTitle'];
    try {
        $controller = new Controller();
        $titles = $controller->getMovieTitlesByTittleSuggestion($partialMovieTitle);
        $n = array();
        while ($data = $titles->fetch_assoc()) {
            $n[] = $data;
        }
        echo json_encode($n);
    } catch (Exception $e) {
    }
}
function handleGetMoviesByTitle($data)
{
    $MovieTitle = $data['movieTitle'];
    try {
        $controller = new Controller();
        $movies = $controller->getMoviesByTittleSuggestion($MovieTitle);
        $response = "";
        foreach ($movies as $movie) {
            $response .= "<div class='card' style='width: 400px;z-index: -1;'>
            <h5 class='card-title'>" . $movie->get_title() . "</h5>
            <p>(" . $movie->get_year() . ")</p>
                <img class='card-img-top' src='../" . $movie->get_coverUrl() . "' alt='".$movie->get_title()."_cover"."' style='width=284.438px;height:420.953px;'>
                <div class='card-body'>
                    <p class='card-text'>" . $movie->get_description() . "</p>
                </div>
                <ul class='list-group list-group-flush'>
                    <li class='list-group-item'>Directors: " . $movie->get_directors() . "</li>
                    <li class='list-group-item'>Writers: " . $movie->get_writers() . "</li>
                    <li class='list-group-item'>Stars: " . $movie->get_stars() . "</li>
                </ul>
            </div><br>";
        }
        echo $response;
    } catch (Exception $e) {
        echo "No movies with given title";
    }
}
