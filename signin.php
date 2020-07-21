<?php
  include 'connect.php';
  echo "Connected Successfully";
?>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "myDB";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  matric VARCHAR(11) NOT NULL,
  fname VARCHAR(30) NOT NULL,
  lname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  gender enum('m','f') NOT NULL,
  department VARCHAR(30),
  psw VARCHAR(10) NOT NULL,
  psw2 VARCHAR(10) NOT NULL,
  reg_date TIMESTAMP
  )";

  if ($conn->query($sql) === TRUE) {
      echo "Table Users created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
      $conn->close();
    }

  


  // define variables and set to empty values
  $fnameErr = $lnameErr = $emailErr = $genderErr = $departmentErr = $matric = "";
  $fname = $lname = $email = $gender = $department = $matric = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["fname"])) {
        $fnameErr = "First Name is required";
      } else {
        $fname = test_input($_POST["fname"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
          $fnameErr = "Only letters and white space allowed";
          }
        }

      if (empty($_POST["lname"])) {
        $lnameErr = "Last name is required";
      } else {
        $lname = test_input($_POST["lname"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
          $lnameErr = "Only letters and white space allowed";
          }
        }

      if (empty($_POST["matric"])) {
        $matricErr = "Please enter matric number: ";
      } else {
        $matric = test_input($_POST["matric"]);
      }

      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        }
      }
        
      if (empty($_POST["department"])) {
        $departmentErr = "Select a department";
      } else {
        $department = test_input($_POST["department"]);
      }

      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } else {
        $gender = test_input($_POST["gender"]);
      }

      if (empty($_POST["psw"])) {
        $pswErr = "Input your password";
      } else {
        $psw = test_input($_POST["psw"]);
      }

      if (empty($_POST["psw2"])) {
        $pswErr = "I";
      } else {
        $psw = test_input($_POST["psw2"]);
      }

    }


    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>


<?php
  $sql = "INSERT INTO users (id, fname, lname,  matric, email, department, gender, psw) VALUES ('', '$fname', '$lname', '$matric', '$email', '$department', '$gender', '$psw')";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }


$conn->close();
?>



