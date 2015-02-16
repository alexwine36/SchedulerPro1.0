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

class Users {
    // database connection and table name
    private $conn;
    private $table_name = "Users";
    // object properties
    public $user_id;
    public $username;
    public $password;
    public $user_type;

    public function __construct($db) {
        $this->conn = $db;
        echo ' <br> ';
        echo ' User Construct success';
    }

    function create() {


        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    users_id = ?, users_username = ?, users_password = ?, users_type = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->user_id);
        $stmt->bindParam(2, $this->username);
        $stmt->bindParam(3, $this->password);
        $stmt->bindParam(4, $this->user_type);

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
        echo '<br>Execute success';

        return $stmt;
    }

}

?>
