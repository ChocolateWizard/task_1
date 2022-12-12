<?php

class Place
{

    private int $id;
    private string $name;

    public function __construct(int $id = null, string $name = "")
    {
        $this->id = $id;
        $this->name = $name;
    }


    function set_id($id)
    {
        $this->id = $id;
    }
    function get_id()
    {
        return $this->id;
    }

    function set_name($name)
    {
        $this->name = $name;
    }
    function get_name()
    {
        return $this->name;
    }
}
