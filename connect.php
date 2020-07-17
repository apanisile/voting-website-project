#PHP file to create a database and to connect into the database
<?php
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
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>

<?php
$user = 'root';
$pass = '';
$db = 'mysql';

$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

echo"Great Work!!!";
?>