<?php
class User
{

    private int $id;
    private string $firstName;
    private string $lastName;
    private string $username;
    private string $password;
    private string $email;
    private Place $place;

   public function __construct(int $id = null, string $firstName = "", string $lastName = "", string $username = "", string $password = "", string $email = "", Place $place = null)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->place = $place;
    }


    function set_id($id)
    {
        $this->id = $id;
    }
    function get_id()
    {
        return $this->id;
    }

    function set_firstName($firstName)
    {
        $this->firstName = $firstName;
    }
    function get_firstName()
    {
        return $this->firstName;
    }

    function set_lastName($lastName)
    {
        $this->lastName = $lastName;
    }
    function get_lastName()
    {
        return $this->lastName;
    }

    function set_username($username)
    {
        $this->username = $username;
    }
    function get_username()
    {
        return $this->username;
    }

    function set_password($password)
    {
        $this->password = $password;
    }
    function get_password()
    {
        return $this->password;
    }

    function set_email($email)
    {
        $this->email = $email;
    }
    function get_email()
    {
        return $this->email;
    }

    function set_place($place)
    {
        $this->place = $place;
    }
    function get_place()
    {
        return $this->place;
    }
}
