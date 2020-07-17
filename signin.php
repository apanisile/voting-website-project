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
if(isset($_POST['submit'])){
  //Fetching variables of the form which travels in the URL
  $name = $_POST['name'];
  $gender =$_POST['gender'];
  $department = $_POST['department'];
  $matric = $_POST['matric'];
  $email = $_POST['email'];
	#$psw = $_POST['password']
  if($name !='' && $gender != '' && $department != '' && $matric != '' && $email != '')
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
?>
