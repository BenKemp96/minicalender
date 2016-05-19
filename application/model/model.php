<?php

class Model
{
	function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getAllDates()
    {
        $sql = "SELECT * FROM birthdays ORDER BY day";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addDate($person, $day, $month, $year)
    {
        $sql = "INSERT INTO birthdays (person, day, month, year) VALUES (:person, :day, :month, :year)";
        $query = $this->db->prepare($sql);
        $parameters = array(':person' => $person, ':day' => $day, ':month' => $month, ':year' => $year);

        $query->execute($parameters);
    }

    public function deleteDate($date_id)
    {
        $sql = "DELETE FROM birthdays WHERE id = :date_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':date_id' => $date_id);

        $query->execute($parameters);
    }

    public function getDate($date_id)
    {
        $sql = "SELECT * FROM birthdays WHERE id = :date_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':date_id' => $date_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function updateDate($person, $day, $month, $year, $date_id)
    {
        $sql = "UPDATE birthdays SET person = :person, day = :day, month = :month, year = :year WHERE id = :date_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':person' => $person, ':day' => $day, ':month' => $month, ':year' => $year, ':date_id' => $date_id);

        $query->execute($parameters);
    }
}