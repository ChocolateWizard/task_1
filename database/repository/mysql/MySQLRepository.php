<?php

require_once (__DIR__."/../../../config.php");
require_once (SITE_ROOT."/database/repository/IRepository.php");
abstract class MySQLRepository implements IRepository
{

    protected $connection;

    function __construct()
    {
        $this->connection = null;
    }

    public function connect()
    {
        try {
            include(SITE_ROOT.'/database/repository/mysql/MySQLConnector.php');
            $this->connection = $db;
        } catch (ErrorException $ex) {
            throw new ErrorException("Unable to establish connection with database");
        }
    }
    public function disconnect()
    {
        if ($this->connection != null) {
            $this->connection->close();
            $this->connection = null;
        }
    }
    public function commit()
    {
        if ($this->connection != null) {
            $this->connection->commit();
        }
    }
    public function rollback()
    {
        if ($this->connection != null) {
            $this->connection->rollback();
        }
    }
}
