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


  // define variables and set to empty values
  $usrnameErr = $emailErr = $genderErr = $departmentErr = $matric = "";
  $usrname = $email = $gender = $department = $matric = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["usrname"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["usrname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      }
    }


    if (empty($_POST["matric"])) {
      $matric = "";
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
      $department = "";
    } else {
      $department = test_input($_POST["department"]);
    }

    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["psw"])) {
      $genderErr = "Input your password";
    } else {
      $psw2 = test_input($_POST["psw"]);
    }

    if (empty($_POST["psw2"])) {
      $genderErr = "Please repeat your password";
    } else {
      $psw2 = test_input($_POST["psw-repeat"]);
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
if(isset($_POST['save'])){
  //Fetching variables of the form which travels in the URL
  $usrname = $_POST['usrname'];
  $gender =$_POST['gender'];
  $department = $_POST['department'];
  $matric = $_POST['matric'];
  $email = $_POST['email'];
	#$psw = $_POST['password']
  if($usrname !='' && $gender != '' && $department != '' && $matric != '' && $email != '')
      {
          //  To redirect form on a particular page
          header("vote.html");
        } else {
          ?>
          <span>
          <?php echo "Please fill all fields.....!!!!!!!!!!!!";?>
        </span>
        <?php
        }
      
}

$sql = "INSERT INTO Users (matric, fullname, email)
VALUES ($matric, $usrname, $email)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

<?php
  extract($_POST);
  if(esset($save)){
  //To check user already exists or not
  $sql=mysql_query("select email from userdetails where email='$email'");
  $return=mysql_num_rows($sql);
  //if $return returns true value it means user's email already exists
  if($return){
    $msg="<font color='red'>".ucfirst($e)."already exists choose another email</font>";
  } else {
    $query="insert into userdetails values('$matric','$usrname','$email','$psw','$m','$gender', '$department')";
    mysql_query($query);
    $msg= "<font color='blue'>Your data saved</font>";
  }
}
?>
