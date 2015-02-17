<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Database {

    //specify database credentials
    private $host = 'localhost';
    private $db_name = 'SchedulerProDB';
    private $username = 'root';
    private $password = 'root';
    public $conn;

    //get database connection
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            echo 'Database Success';
        } catch (PDOException $ex) {
            echo 'Connection error: ' . $ex->getMessage();
        }
        return $this->conn;
    }

}

?>