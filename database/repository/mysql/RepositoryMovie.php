<?php
require_once(__DIR__ . "/../../../config.php");
require_once(SITE_ROOT . "/database/repository/mysql/MySQLRepository.php");
require_once(SITE_ROOT . "/domain/Movie.php");
class RepositoryMovie extends MySQLRepository
{

    function getAll(): null|array
    {
        throw new Exception("Operation not supported");
    }

    function getTitlesByTittleSuggestion($movieTittleSuggestion)
    {
        if ($this->connection == null) {
            throw new Exception("Connection not established with database");
        }
        $sql = "select title from movie where title like '$movieTittleSuggestion%' ORDER BY title";
        $titles = $this->connection->query($sql);
        if ($titles->num_rows == 0) {
            throw new Exception("No such movies in database");
        } else {
            return $titles;
        }
    }
}
