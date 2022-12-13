<?php

final class UserQuery
{

    public static $constraints = array(
        "id" => array("minValue" => 0),
        "firstName" => array("maxLength" => 100, "minLength" => 0, "required" => "required"),
        "lastName" => array("maxLength" => 100, "minLength" => 0, "required" => "required"),
        "username" => array("maxLength" => 100, "minLength" => 0, "required" => "required"),
        "password" => array("maxLength" => 100, "minLength" => 4, "required" => "required"),
        "email" => array("maxLength" => 320, "minLength" => 0, "required" => "required"),
        "place" => array("required" => "required")
    );
}
