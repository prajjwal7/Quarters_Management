<?php
session_start();
if(!$_SESSION['id']) {
  header("location:index.php");
}
include("connection.php");
if(isset ($_POST["submit"])){
     // if($_SESSION['id']){
          $id=$_SESSION['id'];
          $sql = "Select RoomNo,FloorNo from users where ID ='$id'";
          $res=mysqli_query($conn, $sql) or die(mysqli_error($conn));
          if(mysqli_num_rows($res)){
               $x=mysqli_fetch_assoc($res);
               $roomno=$x["RoomNo"];
               $floorno=$x["FloorNo"];

               //inserting into the table of complaints
               $details=$_POST['details'];
               $status="pending";
               $sql1 = "INSERT into complaints VALUES('$floorno','$roomno','$id','$status','$details')";
               $res1 = mysqli_query($conn, $sql1);
               ?>
                <script type="text/javascript">
                complaint();
                function complaint() {
                  if(confirm("Complaint Registered Successfully.")) {
                    <?php
                      header("location:guestLoggedIn.php");
                    ?>
                  }
                }
                </script>
               <?php

          }
          // else{
          //      echo '<script type="text/javascript">alert("Please Register first to log a complaint!")</script>';
          //     // header("Location:singup.php"); please add sign in one here
          // }


     // }
     // else{
     //      echo '<script type="text/javascript">alert("Please log in to register a complaint!")</script>';
     //      // header("Location:singup.php"); please add login in one here
     // }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Quarters Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="complaints.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> <!--Lobster-->
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> <!--Roboto-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>

<body>
      <div class="container">
          <div class="d-flex justify-content-center h-100">
               <div class="card">
                    <div class="card-header" style="background-color: #FFC312">
                         <h3>Register Complaint</h3>
                    </div>
                    <div class="card-body">
                         <form class="form-horizontal" action="" method="POST">

                               <div class="form-group">
                                   <label for ="Details" class="cols-sm-2 control-label">Details :</label>
                                        <textarea class="form-control" name="details" rows="4" placeholder="Details of the complaint"></textarea>

                              </div>

                              <div class="form-group row align-items-center sign-btn">
                                   <input type="cancel" name="cancel" value="Cancel" class="btn float-right sign_btn">
                                   <span class ="btn-space"></span>
                                   <input type="submit" name="submit" value="Submit" class="btn float-right sign_btn">
                              </div>

                         </form>
                    </div>
               </div>
          </div>
      </div>

</body>
</html>
