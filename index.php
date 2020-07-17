<?php
include 'connect.php';
echo "Connected Successfully";
$user = 'root';
$pass = '';
$db = 'myDB';

$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$conn = new mysqli($servername, $username, $password, $dbname);
// sql to create table
$sql = "CREATE TABLE Users (
matric INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>