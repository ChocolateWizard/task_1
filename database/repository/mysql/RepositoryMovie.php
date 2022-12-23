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

    function getMoviesByTittleSuggestion($movieTittleSuggestion)
    {
        if ($this->connection == null) {
            throw new Exception("Connection not established with database");
        }
        $sql = "select id,title,year,cover_url,description,directors,writers,stars from movie where title like ? ORDER BY title";
        $sql = $this->connection->prepare($sql);
        $movieTittleSuggestion.="%";
        $sql->bind_param("s", $movieTittleSuggestion);
        $sql->execute();
        $sql = $sql->get_result();
        if ($sql->num_rows == 0) {
            throw new Exception("No such movies in database");
        } else {
            $movies = [];
            while ($row = $sql->fetch_object()) {
                $id = $row->id;
                $title = $row->title;
                $year = $row->year;
                $cover_url = $row->cover_url;
                $description = $row->description;
                $directors = $row->directors;
                $writers = $row->writers;
                $stars = $row->stars;
                $movies[] = new Movie($id, $title, $year, $cover_url, $description, $directors, $writers, $stars);
            }
            return $movies;
        }
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
