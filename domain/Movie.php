<?php
class Movie
{
    private int|null $id;
    private string $title;
    private int|null $year;
    private string $coverUrl;
    private string $description;
    private string $directors;
    private string $writers;
    private string $stars;

    public function __construct($id = null, $title = "", $year = null, $coverUrl = "", $description = "", $directors = "", $writers = "", $stars = "")
    {
        $this->id = $id;
        $this->title = $title;
        $this->year = $year;
        $this->coverUrl = $coverUrl;
        $this->description = $description;
        $this->directors = $directors;
        $this->writers = $writers;
        $this->stars = $stars;
    }

    public function get_id()
    {
        return $this->id;
    }
    public function set_id(int|null $id)
    {
        $this->id = $id;
    }
    public function get_title()
    {
        return $this->title;
    }
    public function set_title(string $title)
    {
        $this->title = $title;
    }
    public function get_year()
    {
        return $this->year;
    }
    public function set_year(int|null $year)
    {
        $this->year = $year;
    }
    public function get_coverUrl()
    {
        return $this->coverUrl;
    }
    public function set_coverUrl(string $coverUrl)
    {
        $this->coverUrl = $coverUrl;
    }
    public function get_description()
    {
        return $this->description;
    }
    public function set_description(string $description)
    {
        $this->description = $description;
    }
    public function get_directors()
    {
        return $this->directors;
    }
    public function set_directors(string $directors)
    {
        $this->directors = $directors;
    }
    public function get_writers()
    {
        return $this->writers;
    }
    public function set_writers(string $writers)
    {
        $this->writers = $writers;
    }
    public function get_stars()
    {
        return $this->stars;
    }
    public function set_stars(string $stars)
    {
        $this->stars = $stars;
    }
}
