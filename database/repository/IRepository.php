<?php

interface IRepository{

public function connect();
public function disconnect();
public function commit();
public function rollback();

public function getAll();

}
