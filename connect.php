<?php
//PHP file to create a database and to connect into the database
$servername = "localhost";
$user = "root";
$pass = "";

// Create connection
$conn = new mysqli('localhost', $user, $pass);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

//select database
mysql_select_db("myDB");
// create a table userdetails   
$que = "CREATE TABLE IF NOT EXISTS users (
  matric int(11) NOT NULL PRIMARY KEY,
  usrname char(50) NOT NULL,
  email varchar(50) NOT NULL,
  psw varchar(50) NOT NULL,
  gender enum('m','f') NOT NULL,
  reg_date TIMESTAMP,
)";

//Execute query using query analyzer function
mysql_query($que);
?>


<?php
echo"Great Work!!!";
?>