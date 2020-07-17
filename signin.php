<?php
  // define variables and set to empty values
  $nameErr = $emailErr = $genderErr = $departmentErr = $matric = "";
  $name = $email = $gender = $comment = $department = $matric = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
    }
    if (empty($_POST["matric"])) {
      $department = "";
    } else {
      $department = test_input($_POST["matric"]);
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
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