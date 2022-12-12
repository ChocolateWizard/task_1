<?php
require_once (__DIR__."/../config.php");
require(SITE_ROOT."/database/repository/mysql/RepositoryPlace.php");
class Controller
{

    private RepositoryPlace $repoPlace;

    function __construct()
    {
        $this->repoPlace = new RepositoryPlace();
    }

    function getAllPlaces()
    {
        try {
            $this->repoPlace->connect();
            $places = $this->repoPlace->getAll();
            $this->repoPlace->commit();
            return $places;
        } catch (ErrorException $e) {
            $this->repoPlace->rollback();
            throw $e;
        } finally {
            $this->repoPlace->disconnect();
        }
    }
}
