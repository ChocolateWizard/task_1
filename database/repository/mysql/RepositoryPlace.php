<?php
require_once (__DIR__ . "/../../../config.php");
require(SITE_ROOT . "/database/repository/mysql/MySQLRepository.php");
require(SITE_ROOT . "/domain/Place.php");
class RepositoryPlace extends MySQLRepository
{

    function getAll(): null|array
    {
        if ($this->connection == null) {
            throw new ErrorException("Connection not established with database");
        }
        $sql = "select id,name from place";
        $rs = $this->connection->query($sql);
        if ($rs->num_rows == 0) {
            return null;
        } else {
            $places = [];
            while ($row = $rs->fetch_object()) {
                $places[] = new Place($row->id, $row->name);
            }
            return $places;
        }
    }
}
