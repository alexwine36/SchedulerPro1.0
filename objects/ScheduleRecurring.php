<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ScheduleRecurring {

    // database connection and table name
    private $conn;
    private $table_name = "ScheduleRecurring";
    // object properties
    public $id;
    public $name;
    public $description;
    public $cat_id;
    public $contact_id;
    public $cost;

    public function __construct($db) {
        $this->conn = $db;
        //echo ' <br> ';
        //echo ' ScheduleRecurring Construct success';
    }

    function create() {


        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    sch_rec_id = ?, sch_rec_name = ?, sch_rec_description = ?, sch_rec_schedcat_id = ?, sch_rec_contact_id = ?, sch_rec_cost = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);
        $stmt->bindParam(2, $this->name);
        $stmt->bindParam(3, $this->description);
        $stmt->bindParam(4, $this->cat_id);
        $stmt->bindParam(5, $this->contact_id);
        $stmt->bindParam(6, $this->cost);

        if ($stmt->execute()) {
            return true;
            echo '<br>Execute success';
        } else {
            return false;
        }
    }

    function createName() {
        //write query
        //echo $this->cat_id;
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    sch_rec_name = :recname, sch_rec_schedcat_id = :catid";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':recname', $this->name);
        echo '<br><br>Recurring Name: '
        . $this->name;
        $stmt->bindParam(':catid', $this->cat_id);
        echo '<br><br>Recurring Schedule Category ID: '
        . $this->cat_id;
        if ($stmt->execute()) {
            
            echo '<br>Execute success';
            return true;
        } else {
            return false;
        }
    }

    function read() {
        //select all data
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        //echo '<br>Execute success';

        return $stmt;
    }

}

?>