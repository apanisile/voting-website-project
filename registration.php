<?php
$matric = $_POST['matric'];
$usrname = $_POST['username'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$department = $_POST['department'];
$psw = $_POST['psw'];

if(!empty(matric) || !empty(usrname) || !empty(email) || 
    !empty(gender) || !empty(department) || !empty(psw)){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else { 
        $sql = "INSERT INTO Users (matric, fullname, email)
        VALUES ($matric, $usrname, $email)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "All fields are required";
}

?>