

<?php
extract($_POST);
if(isset($_POST['submit'])){
    $matric = $_POST['matric'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $psw = $_POST['psw'];

    if($matric !='' && $username !='' && $email !='' && $gender !='' && $department !='' && $psw = ""){
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
            $SELECT = "SELECT email From users Where email = ? Limit = 1";
            $sql = "INSERT INTO users (id, username, email, gender, department, psw) 
            VALUES (?, ?, ?, ?, ?, ?)";

            //Prepare statement
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum = $stmt -> num_rows;

            if($rnum==0){
                $stmt->close();

                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("isssss", $id, $username, $email, $gender, $department, $psw);
                $stmt->execute();
                echo "New record created successfully";

            } else {
                echo "Someone already registered using this email";
            }
            $stmt->close();
            $conn->close();
        }
    } else {
        echo "All fields are required";
        die();
    }
}
?>