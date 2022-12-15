<?php
require_once(__DIR__ . "/../../../config.php");
require_once(SITE_ROOT . "/database/repository/mysql/MySQLRepository.php");
require_once(SITE_ROOT . "/domain/Place.php");
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
    function find(int $id): null|Place
    {
        if ($this->connection == null) {
            throw new ErrorException("Connection not established with database");
        }
        $sql = "select id,name from place where id=?";
        $sql = $this->connection->prepare($sql);
        $sql->bind_param("i", $id);
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows == 0) {
            return null;
        }
        $pom = $result->fetch_object();
        return new Place($pom->id, $pom->name);
    }
}
