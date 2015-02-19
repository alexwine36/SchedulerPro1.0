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
    public $user_email;
    public $user_active;

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
                     users_username = ?, users_password = ?, users_type = ?, users_email = ?";

        $stmt = $this->conn->prepare($query);

        //$stmt->bindParam(1, $this->user_id);
        $stmt->bindParam(1, $this->username);
        $stmt->bindParam(2, $this->password);
        $stmt->bindParam(3, $this->user_type);
        $stmt->bindParam(4, $this->user_email);

        if ($stmt->execute()) {
            return true;
            echo '<br>Execute success';
        } else {
            return false;
        }
        //$this->conn = NULL;
    }

    function read() {
        //select all data
        $query = "SELECT
                    *
                FROM" . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        echo '<br>Execute success';
        //$this->conn = null;
        return $stmt;
    }

    function findUser() {
        echo '<br>Find User Started';
        $query = "SELECT
                users_username, users_type
            FROM
                " . $this->table_name .
                "
            WHERE
                users_username = :username AND users_password = :password
            ";


        $stmt = $this->conn->prepare($query);
        echo '<br>Statement Prepared';
        $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
        echo '<br>Statement Bound';


        $stmt->execute();
        echo '<br>Statement Ran';
        $obj = $stmt->rowCount();
        $result = $stmt->fetchObject();
        //echo $obj->username;
        if ($obj > 0) {
            echo "<br>" . $obj;
            echo "<br>" . $result->users_username;
            $_SESSION['username'] = $result->users_username;
            $_SESSION['type'] = $result->users_type;
            echo '<br>';
            print_r($_SESSION);
            return true;
        }
    }
}

?>
