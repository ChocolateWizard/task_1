<?php
require_once(__DIR__ . "/../../../config.php");
require_once(SITE_ROOT . "/database/repository/mysql/MySQLRepository.php");
require_once(SITE_ROOT . "/domain/User.php");
class RepositoryUser extends MySQLRepository
{



    function getAll(): null|array
    {
        throw new ErrorException("Unsuported operation");
    }

    function insert(User $user)
    {
        if ($this->connection == null) {
            throw new Exception("Connection not established with database");
        }
        $sql = "insert into user(first_name,last_name,username,password,email,country_id) values(?,?,?,?,?,?);";
        $sql = $this->connection->prepare($sql);
        $firstName =  $user->get_firstName();
        $lastName = $user->get_lastName();
        $email = $user->get_email();
        $username =  $user->get_username();
        $password = $user->get_password();
        $countryId = $user->get_country()->get_id();
        $sql->bind_param("sssssi", $firstName, $lastName, $username, $password, $email, $countryId);
        $sql->execute();
    }
    function findByUsername(User $user): User|null
    {
        if ($this->connection == null) {
            throw new Exception("Connection not established with database");
        }
        $sql = "select u.id,u.first_name,u.last_name,u.username,u.password,u.email,u.country_id,c.name from user u inner join country c on(u.country_id=c.id) where u.username=?;";
        $sql = $this->connection->prepare($sql);
        $username = $user->get_username();
        $sql->bind_param("s", $username);
        $sql->execute();
        $sql = $sql->get_result();
        if ($sql->num_rows == 0) {
            return null;
        } else {
            while ($row = $sql->fetch_object()) {
                $id = $row->id;
                $firstName = $row->first_name;
                $lastName = $row->last_name;
                $email = $row->email;
                $username = $row->username;
                $password = $row->password;
                $countryId = $row->country_id;
                $countryName = $row->name;
                return new User($firstName, $lastName, $username, $password, $email, new Country($countryId, $countryName), $id);
            }
        }
    }
    function findByEmail(User $user): User|null
    {
        if ($this->connection == null) {
            throw new Exception("Connection not established with database");
        }
        $sql = "select u.id,u.first_name,u.last_name,u.username,u.password,u.email,u.country_id,c.name from user u inner join country c on(u.country_id=c.id) where u.email=?;";
        $sql = $this->connection->prepare($sql);
        $email = $user->get_email();
        $sql->bind_param("s", $email);
        $sql->execute();
        $sql = $sql->get_result();
        if ($sql->num_rows == 0) {
            return null;
        } else {
            while ($row = $sql->fetch_object()) {
                $id = $row->id;
                $firstName = $row->first_name;
                $lastName = $row->last_name;
                $email = $row->email;
                $username = $row->username;
                $password = $row->password;
                $countryId = $row->country_id;
                $countryName = $row->name;
                return new User($firstName, $lastName, $username, $password, $email, new Country($countryId, $countryName), $id);
            }
        }
    }
    function setToken(User $user): User|null
    {
        if ($this->connection == null) {
            throw new Exception("Connection not established with database");
        }
        $sql = "update user set token=?,tokenExpire=DATE_ADD(NOW(),INTERVAL 5 MINUTE) where username=?;";
        $sql = $this->connection->prepare($sql);
        $email = $user->get_email();
        $sql->bind_param("s", $email);
        $sql->execute();
        $sql = $sql->get_result();
        if ($sql->num_rows == 0) {
            return null;
        } else {
            while ($row = $sql->fetch_object()) {
                $id = $row->id;
                $firstName = $row->first_name;
                $lastName = $row->last_name;
                $email = $row->email;
                $username = $row->username;
                $password = $row->password;
                $countryId = $row->country_id;
                $countryName = $row->name;
                return new User($firstName, $lastName, $username, $password, $email, new Country($countryId, $countryName), $id);
            }
        }
    }
}
