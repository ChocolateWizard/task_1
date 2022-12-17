<?php
require_once(__DIR__ . "/../../../config.php");
require_once(SITE_ROOT . "/database/repository/mysql/MySQLRepository.php");
require_once(SITE_ROOT . "/domain/Country.php");
class RepositoryCountry extends MySQLRepository
{

    function getAll(): null|array
    {
        if ($this->connection == null) {
            throw new ErrorException("Connection not established with database");
        }
        $sql = "select id,name from country";
        $rs = $this->connection->query($sql);
        if ($rs->num_rows == 0) {
            return null;
        } else {
            $countries = [];
            while ($row = $rs->fetch_object()) {
                $countries[] = new Country($row->id, $row->name);
            }
            return $countries;
        }
    }
    function find(int $id): null|Country
    {
        if ($this->connection == null) {
            throw new ErrorException("Connection not established with database");
        }
        $sql = "select id,name from country where id=?";
        $sql = $this->connection->prepare($sql);
        $sql->bind_param("i", $id);
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows == 0) {
            return null;
        }
        $pom = $result->fetch_object();
        return new Country($pom->id, $pom->name);
    }
}
