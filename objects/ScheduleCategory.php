<?php

/*
 * Copyright (C) 2015 alexanderwine
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

echo 'Database Accessed';

class ScheduleCategory {

    // database connection and table name
    private $conn;
    private $table_name = "ScheduleCategory";
    // object properties
    public $schedcat_id;
    public $schedcat_name;

    public function __construct($db) {
        $this->conn = $db;
        //echo ' <br> ';
        echo ' ScheduleCategory Construct success';
    }

    function createName() {


        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    schedcat_name = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->schedcat_name);


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
    function readName() {
        $query = "SELECT"
                . " schedcat_id "
                . " FROM "
                . $this->table_name . " WHERE "
                . " schedcat_name = :schedcat_name";
        
        $stmt = $this->conn->prepare($query);
        echo '<br>Statement Prepared';
        $stmt->bindParam(':schedcat_name', $this->schedcat_name, PDO::PARAM_STR);
        echo '<br>Statement Bound';


        $stmt->execute();
        echo '<br>Statement Ran';
        $obj = $stmt->rowCount();
        $result = $stmt->fetchObject();
        //echo $obj->username;
        if ($obj > 0) {
            echo "<br>" . $obj;
            
            $selectedId = $result->schedcat_id;
            $GLOBALS['sid'] = $selectedId;
            echo "<br>" . $selectedId;
            echo '<br>';
            
            return true;
        }
    }
}

?>