<?php
include 'connect.php';
include 'connect1.php';

$matric = $_POST['matric'];
$usrname = $_POST['usrname'];
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
        $SELECT = "SELECT matric From users Where matric = ? Limit = 1";
        $sql = "INSERT INTO users (matric, username, email, gender, department, psw) 
        VALUES (?, ?, ?, ?, ?, ?)";

        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("i", $matric);
        $stmt-> execute();
        $stmt->bind_result($matric);
        $stmt->store_result();
        $rnum = $stmt -> num_rows;

        if($rnum==0){
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("isssss", $matric, $usrname, $email, $gender, $department, $psw);
            $stmt->execute();
            echo "New record created successfully";

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields are required";
    die();
}

?>