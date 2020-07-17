<?php
  // define variables and set to empty values
  $nameErr = $emailErr = $genderErr = $departmentErr = $matric = "";
  $name = $email = $gender = $comment = $department = $matric = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
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

  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>


<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $department;
echo "<br>";
echo $matric;
echo "<br>";

echo $gender;
?>