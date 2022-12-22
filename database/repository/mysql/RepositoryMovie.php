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
}
