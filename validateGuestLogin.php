<?php

  $_SESSION['un'] = "";
  function validate($data) {
    return trim(stripslashes(htmlspecialchars($data)));
  }
  $password = $reg = "";
  if(!$_POST["regNo"])
    $Lregerror = "Please Enter User ID.<br>";
  else {
        $reg = validate($_POST["regNo"]);
  }
  if(!$_POST["password"])
    $Lpasserror = "Please Enter the Password.<br>";
  else {
    $password = validate($_POST["password"]);
  }

  if($reg && $password) {
      $query = "SELECT Name,ID,Password FROM users WHERE ID='$reg'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

      if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if($row["Password"] == $password){
          $_SESSION['un'] = $row['Name'];
          header("location:guestLoggedIn.php");
        }
        else {
          $Lpasserror = "Wrong Password.<br>";
        }
      }else {
        $Lregerror = "User ID Not Found.<br>";
      }
  }

?>
