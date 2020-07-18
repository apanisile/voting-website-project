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
?>


<?php
echo"Great Work!!!";
?>