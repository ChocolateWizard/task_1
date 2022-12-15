<?php
require_once(__DIR__ . "/../config.php");
require_once(SITE_ROOT . "/database/repository/mysql/RepositoryPlace.php");
require_once(SITE_ROOT . "/database/repository/mysql/RepositoryUser.php");
require_once(SITE_ROOT . "/domain/User.php");
class Controller
{

    private RepositoryPlace $repoPlace;
    private RepositoryUser $repoUser;

    function __construct()
    {
        $this->repoPlace = new RepositoryPlace();
        $this->repoUser = new RepositoryUser();
    }

    function getAllPlaces()
    {
        try {
            $this->repoPlace->connect();
            $places = $this->repoPlace->getAll();
            $this->repoPlace->commit();
            return $places;
        } catch (Exception $e) {
            $this->repoPlace->rollback();
            throw $e;
        } finally {
            $this->repoPlace->disconnect();
        }
    }
    function registerUser($firstName, $lastName, $email, $username, $password, $placeId)
    {
        $user = $this->validateUserData($firstName, $lastName, $email, $username, $password, $placeId);
        try {
            $this->repoUser->connect();
            $dbUser = $this->repoUser->findByUsername($user);
            if ($dbUser != null) {
                throw new Exception("Given username already exists!");
            }
            $this->repoUser->insert($user);
            $this->repoUser->commit();
        } catch (Exception $e) {
            $this->repoUser->rollback();
            throw $e;
        } finally {
            $this->repoUser->disconnect();
        }
    }
    private function validateUserData($firstName, $lastName, $email, $username, $password, $placeId): User
    {
        $firstName = $this->trimInput($firstName);
        $lastName = $this->trimInput($lastName);
        $email = $this->trimInput($email);
        $username = $this->trimInput($username);
        $password = $this->trimInput($password);
        $placeId = $this->trimInput($placeId);
        $placeId = $this->parseInt($placeId);
        $this->checkIfPlaceExists($placeId);
        return new User($firstName, $lastName,  $username, $password, $email, new Place($placeId));
    }
    //trims string of trailing space lines and empty spaces as protection against SQL injection
    private function trimInput(string $data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //checks if variable string is int and returns it as int, if not throws exception
    private function parseInt(string $placeId): int
    {
        if (!is_numeric($placeId)) {
            throw new Exception("Invalid place passed!");
        }
        return (int)$placeId;
    }
    //if place exists does nothing, else throws exception
    private function checkIfPlaceExists(int $placeId)
    {
        try {
            $this->repoPlace->connect();
            $place = $this->repoPlace->find($placeId);
            $this->repoPlace->commit();
            if ($place == null) {
                throw new Exception("Invalid place passed!");
            }
        } catch (Exception $e) {
            $this->repoPlace->rollback();
            throw $e;
        } finally {
            $this->repoPlace->disconnect();
        }
    }
}
