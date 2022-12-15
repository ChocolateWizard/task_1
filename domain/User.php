<?php
class User
{

    private int|null $id;
    private string $firstName;
    private string $lastName;
    private string $username;
    private string $password;
    private string $email;
    private Place|null $place;

    public function __construct(string $firstName = "", string $lastName = "", string $username = "", string $password = "", string $email = "", Place $place = null, int $id = null)
    {    
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->place = $place;
        $this->id = $id;
    }


    function set_id(int $id)
    {
        $this->id = $id;
    }
    function get_id(): int
    {
        return $this->id;
    }

    function set_firstName(string $firstName)
    {
        $this->firstName = $firstName;
    }
    function get_firstName(): string
    {
        return $this->firstName;
    }

    function set_lastName(string $lastName)
    {
        $this->lastName = $lastName;
    }
    function get_lastName(): string
    {
        return $this->lastName;
    }

    function set_username(string $username)
    {
        $this->username = $username;
    }
    function get_username(): string
    {
        return $this->username;
    }

    function set_password(string $password)
    {
        $this->password = $password;
    }
    function get_password(): string
    {
        return $this->password;
    }

    function set_email(string $email)
    {
        $this->email = $email;
    }
    function get_email(): string
    {
        return $this->email;
    }

    function set_place(Place $place)
    {
        $this->place = $place;
    }
    function get_place(): Place
    {
        return $this->place;
    }
}
