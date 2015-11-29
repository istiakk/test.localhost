<?php

class contactController extends Controller {

    protected function init() {
        $this->create();
        $this->mysqlConnection();
        
    }

    public function create($name = null, $email = null, $msg = null) {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "contactinfo";

        // Create connection
        $conn = mysql_connect($servername, $username, $password);

        if (!$conn) {
            die('Could not connect: ' . mysql_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == 'POST') {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $msg = $_POST['message'];
            echo $content= $_POST['content'];

            $sql = "INSERT INTO info_contact " . "(name, email, message, content) " . "VALUES('$name','$email','$msg', '$content')";

            mysql_select_db($dbname);
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval )
            {
               die('Could not enter data: ' . mysql_error());
            }

            echo "Entered data successfully\n";

            $result = mysql_query('SELECT * FROM `info_contact`');
            
            if (!$result){
                die('Couldn\'t fetch records');
            }
            
            $num_fields = mysql_num_fields($result);
            
            $headers = array();
            for ($i = 0; $i < $num_fields; $i++) {
                $headers[] = mysql_field_name($result, $i);
            }
            $fp = fopen('php://output', 'w');
            if ($fp && $result) {
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="myCsvFile.csv"');
                header('Pragma: no-cache');
                header('Expires: 0');
                fputcsv($fp, $headers);
                while ($row = mysql_fetch_row($result)) {
                    fputcsv($fp, array_values($row));
                }
                die;
            }
        }
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
            
        } else {

            $DBTablesql = 'CREATE TABLE IF NOT EXISTS info_contact ( 
                id INT(11) NOT NULL AUTO_INCREMENT,
                name VARCHAR(16) NOT NULL,
		email VARCHAR(255) NOT NULL,
		message VARCHAR(255) NULL,
		content MEDIUMBLOB NOT NULL,
                contactTime datetime NOT NULL DEFAULT NOW(),
                    PRIMARY KEY (id)
                )';

            mysql_select_db('contactinfo');
            $retval = mysql_query($DBTablesql, $conn);

            if (!$retval) {
                die('Could not create table: ' . mysql_error());
            }

            // returning the mysql connection
            return $conn;
        }
    }
    
    

}
