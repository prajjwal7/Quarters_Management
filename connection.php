<?php
//Database Details
  $server = "localhost";
  $username = "root";
  $password = "";
  $db = "quarters_management";
//Create connection
  $conn = mysqli_connect($server, $username, $password, $db);
//Check Connection
      if(!$conn){
          die("Connection Failed: ".mysqli_connect_error());
      }
?>
