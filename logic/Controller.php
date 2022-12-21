<?php
require_once(__DIR__ . "/../config.php");
require_once(SITE_ROOT . "/database/repository/mysql/RepositoryCountry.php");
require_once(SITE_ROOT . "/database/repository/mysql/RepositoryUser.php");
require_once(SITE_ROOT . "/domain/User.php");
class Controller
{

    private RepositoryCountry $repoCountry;
    private RepositoryUser $repoUser;

    function __construct()
    {
        $this->repoCountry = new RepositoryCountry();
        $this->repoUser = new RepositoryUser();
    }

    function getAllCountries()
    {
        try {
            $this->repoCountry->connect();
            $countries = $this->repoCountry->getAll();
            $this->repoCountry->commit();
            return $countries;
        } catch (Exception $e) {
            $this->repoCountry->rollback();
            throw $e;
        } finally {
            $this->repoCountry->disconnect();
        }
    }
    function registerUser($firstName, $lastName, $email, $username, $password, $countryId)
    {
        $user = $this->validateRegUserData($firstName, $lastName, $email, $username, $password, $countryId);
        try {
            $this->repoUser->connect();
            $dbUser = $this->repoUser->findByUsername($user);
            if ($dbUser != null) {
                throw new Exception("Given username already exists!");
            }
            $dbUser = $this->repoUser->findByEmail($user);
            if ($dbUser != null) {
                throw new Exception("Given email already exists!");
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
    function loginUser($username, $password): User
    {
        $user = $this->validateLogUserData($username, $password);
        try {
            $this->repoUser->connect();
            $dbUser = $this->repoUser->findByUsername($user);
            if ($dbUser == null) {
                throw new Exception("Given user does not exist!");
            }
            if ($dbUser->get_password() !== $password) {
                throw new Exception("Invalid user credentials!");
            }
            $this->repoUser->commit();
            return $dbUser;
        } catch (Exception $e) {
            $this->repoUser->rollback();
            throw $e;
        } finally {
            $this->repoUser->disconnect();
        }
    }
    function getUser(string $username): User|null
    {
        try {
            $this->repoUser->connect();
            $dbUser = $this->repoUser->findByUsername(new User("", "", $username));
            $this->repoUser->commit();
            return $dbUser;
        } catch (Exception $e) {
            $this->repoUser->rollback();
            throw $e;
        } finally {
            $this->repoUser->disconnect();
        }
    }
    function doesUserEmailExist(string $email): bool
    {
        try {
            $this->repoUser->connect();
            $dbUser = $this->repoUser->findByEmail(new User("", "", "", "", $email));
            $this->repoUser->commit();
            if ($dbUser == null) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            $this->repoUser->rollback();
            throw $e;
        } finally {
            $this->repoUser->disconnect();
        }
    }
    function setToken(string $email, string $token)
    {
        try {
            $this->repoUser->connect();
            $this->repoUser->setToken(new User("", "", "", "", $email));
            $this->repoUser->commit();
        } catch (Exception $e) {
            $this->repoUser->rollback();
            throw $e;
        } finally {
            $this->repoUser->disconnect();
        }
    }
    function deleteUser($id)
    {       
        try {
            $this->repoUser->connect();
            $dbUser = $this->repoUser->findByID($id);
            if ($dbUser == null) {
                throw new Exception("Unable to delete. No such user in database!");
            }
            $this->repoUser->deleteByID($id);
            $this->repoUser->commit();
        } catch (Exception $e) {
            $this->repoUser->rollback();
            throw $e;
        } finally {
            $this->repoUser->disconnect();
        }
    }

    //==================================================================================================================
    private function validateRegUserData($firstName, $lastName, $email, $username, $password, $countryId): User
    {
        $firstName = $this->trimInput($firstName);
        $lastName = $this->trimInput($lastName);
        $email = $this->trimInput($email);
        $username = $this->trimInput($username);
        $password = $this->trimInput($password);
        $countryId = $this->trimInput($countryId);
        $countryId = $this->parseInt($countryId);
        $this->checkIfCountryExists($countryId);
        return new User($firstName, $lastName,  $username, $password, $email, new Country($countryId));
    }
    private function validateLogUserData($username, $password): User
    {
        $username = $this->trimInput($username);
        $password = $this->trimInput($password);
        return new User("", "", $username, $password);
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
    private function checkIfCountryExists(int $countryId)
    {
        try {
            $this->repoCountry->connect();
            $country = $this->repoCountry->find($countryId);
            $this->repoCountry->commit();
            if ($country == null) {
                throw new Exception("Invalid country passed!");
            }
        } catch (Exception $e) {
            $this->repoCountry->rollback();
            throw $e;
        } finally {
            $this->repoCountry->disconnect();
        }
    }
}
