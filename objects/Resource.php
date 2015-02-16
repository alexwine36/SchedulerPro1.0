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

class Resource {
    //put your code here
    
        // database connection and table name
    private $conn;
    private $table_name = "Resources";
    // object properties
    public $id;
    public $name;
    public $capacity;
    public $description;
    public $features;
    public $alt_id;
    public $typ_id;
    public $inactive;

    public function __construct($db) {
        $this->conn = $db;
        //echo ' <br> ';
        //echo ' Resource Construct success';
    }

    function create() {


        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    res_name = ?, res_capacity = ?, res_description = ?, res_features = ?, res_alt_id = ?, res_type_id = ?, res_inactive = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->capacity);
        $stmt->bindParam(3, $this->description);
        $stmt->bindParam(4, $this->features);
        $stmt->bindParam(5, $this->alt_id);
        $stmt->bindParam(6, $this->typ_id);
        $stmt->bindParam(7, $this->inactive);
        

        if ($stmt->execute()) {
            return true;
            echo '<br>Execute success';
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