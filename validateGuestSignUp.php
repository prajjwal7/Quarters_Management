<?php

  function validate($data) {
    return trim(stripslashes(htmlspecialchars($data)));
  }

  $reg = $_POST["regNo"];
  $name = $_POST["name"];
  $cadre = $_POST["cadre"];
  $branch = $_POST["branch"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $password = $_POST["password"];

  if(!$reg) {
    $Sregerror = "Please Enter Reg. No.<br>";
  }
  else{
    $reg = validate($reg);
  }

  if(!$name) {
    $nameerror = "Please Enter Your Name.<br>";
  }
  else{
    $name = validate($name);
  }

  if(!$cadre) {
    $cadreerror = "Please Select Your Cadre.<br>";
  }
  else{
    $cadre = validate($cadre);
  }

  if(!$branch) {
    $brancherror = "Please Select Your Branch.<br>";
  }
  else{
    $branch = validate($branch);
  }

  if(!$email) {
    $emailerror = "Please Enter Your Email.<br>";
  }
  else{
    $email = validate($email);
  }

  if(!$phone) {
    $phoneerror = "Please Enter Your Phone No.<br>";
  }
  else{
    $phone = validate($phone);
  }

  if(!$password) {
    $Spasserror = "Please Enter a Password.<br>";
  }
  else{
    $password = validate($password);
  }


  if($reg && $name && $cadre && $branch && $email && $phone && $password) {
    $query = "INSERT INTO users VALUES('$reg', '$name',  '$email', '$phone', '$branch',  '$cadre', -1, -1, current_timestamp, '$password', -1)";
    if(mysqli_query($conn, $query)) {
      $_SESSION['un'] = $name;
      $_SESSION['id'] = $reg;
      header('location:guestNotBookedLoggedIn.php');
    } else {
      die(mysqli_error($conn));
    }
  }
?>
