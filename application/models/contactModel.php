<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class contactModel extends Model {

    protected function init() {
        
    }

    public function insert($name, $email, $msg) {
        $id = false;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $msg = $_POST['message'];
        $result = $this->db->query("INSERT INTO `info_contact`(`name`,`email`,`message`,`last_update`) VALUES('$name','{$email}','{$msg}',NOW())");
        if ($result !== false) {
            $id = $this->db->insertId();
        }
        return $id;
    }

    public function mysqlConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "contactinfo";

        // Create connection
        $conn = mysql_connect($servername, $username, $password);

        if (!$conn) {
            die('Could not connect: ' . mysql_error());
        }

        // Create database
        $sql = "CREATE DATABASE contactinfo";
        $db_selected = mysql_select_db($dbname, $conn);
        if (!$db_selected) {
            mysql_db_query($sql, $conn);
        }

        // database table
        $val = mysql_query('select 1 from `info_contact` LIMIT 1');

        if ($val !== FALSE) {

            //echo "table info_contact exists";echo "</br>";
        } else {

            //echo "info_contact does not exists";echo "</br>";

            $DBTablesql = 'CREATE TABLE IF NOT EXISTS info_contact ( 
                id INT(11) NOT NULL AUTO_INCREMENT,
                name VARCHAR(16) NOT NULL,
		email VARCHAR(255) NOT NULL,
		message VARCHAR(255) NULL,
		file VARCHAR(255) NULL,
                    PRIMARY KEY (id)
                )';

            mysql_select_db('contactinfo');
            $retval = mysql_query($DBTablesql, $conn);

            if (!$retval) {
                die('Could not create table: ' . mysql_error());
            }

            //echo "Table info_contact created successfully\n";
        }
    }

}
