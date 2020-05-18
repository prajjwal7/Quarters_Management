<?php
  session_start();
  $un = $_SESSION['un'];
  $id = $_SESSION['id'];
  include("connection.php");
  $query = "select RoomNo, BookedDate, Bills, BillStatus FROM users WHERE ID = '$id'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  $row = mysqli_fetch_assoc($result);
  $roomNo = $row['RoomNo'];
  $billStatus = $row['BillStatus'];
  $startDate = $row['BookedDate'];
  $bill = $row['Bills'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quarters Management</title>
    <link rel="stylesheet" href="guestLoggedIn.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> <!--Lobster-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> <!--Roboto-->
  </head>
  <body>
    <header>
      <ul>
        <li><span>Welcome, <?php echo $_SESSION['un']; ?></span></li>
        <li><a onclick="order()" name="service" value="">Room Service</a></li>
        <li><a href="complaint.php" class="a" >Complaint</a></li>
        <li><a href="logout.php" class="a" >Log Out</a></li>
      </ul>
    </header>
    <div class="AllDetails">
      <button type="button" name="roomDetails" class="roomDetails">Details</button>
      <div class="Details" style="display:none;">
          <span>Room No: <?php echo $roomNo; ?></span><br><br>
          <span>Date Of Booking: <?php echo $startDate ?></span>
      </div>
      <button type="button" name="Bills" class="Bills">Bills</button>
      <div class="BillsDetail" style="display:none;">
          <span>Total Bill Amount: <?php echo $bill; ?></span><br><br>
          <span>Bill Status: <?php echo $billStatus; ?></span>
      </div>
      <button type="button" name="status" class="status">Complaint Status</button>
      <div class="Cstatus" style="display:none;">
                    <table class="table table-hover table-dark table-striped" id="att-table">
                        <div class="row" style="margin-bottom: 10px;">
                            <span class="col-md"> <b>See the complaints you have registered!</b></span>
                        </div>
                        <thead>
                            <tr>
                                <th>Complaint_ID</th>
                                <th>Details of Complaint</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                            <tbody>
                            <?php
                            include("connection.php");
                            if($_SESSION['id']){
                                 $id=$_SESSION['id'];
                                 $sql = "SELECT complaint,Status FROM complaints WHERE id_person ='$id'";
                                 $res=mysqli_query($conn,$sql);
                                 if(mysqli_num_rows($res)){
                                      $i=1;
                                      $j=1;
                                      while($row=mysqli_fetch_row($res)){
                                           echo"<tr>";
                                           echo"<td>".$i."</td>";
                                           echo"<td>".$row[0]."</td>";
                                           echo"<td>".$row[1]."</td>";
                                           $i=$i+$j;
                                      }
                                 }
                                 else{
                                      echo"<tr>";
                                           echo"<td></td>";
                                           echo"<td></td>";
                                           echo"<td></td>";
                                 }
                            }
                            ?>
                            </tbody>
                    </table>
                    <center>
                    <?php
                            if($_SESSION['id']){
                                 $id=$_SESSION['id'];
                                 $sql = "SELECT COUNT(*) FROM complaints WHERE id_person ='$id' ";
                                 $res=mysqli_query($conn,$sql);
                                 if(mysqli_num_rows($res)){
                                    while($row=mysqli_fetch_row($res)){

                                    echo"<span class='col-md'> <b>Total Registered =" .$row[0]." </b></span>";}

                            }
                            else{
                                echo"<span class='col-md'> <b>Total = </b></span>";
                            }
                        }

                            ?>
                            <br>
                             <?php
                            if($_SESSION['id']){
                                 $id=$_SESSION['id'];
                                 $sql = "SELECT COUNT(*) FROM complaints WHERE id_person ='$id' and Status='completed' ";
                                 $res=mysqli_query($conn,$sql);
                                 if(mysqli_num_rows($res)){
                                    while($row=mysqli_fetch_row($res)){

                                    echo"<span class='col-md'> <b>Total Resolved =" .$row[0]." </b></span>";}

                            }
                            else{
                                echo"<span class='col-md'> <b>Total = </b></span>";
                            }
                        }
                            ?>
                            <br>
                            <?php
                            // $conn=mysqli_connect("localhost","root","","quarters_managements") or die ('I cannot connect to the database because: ' . mysql_error());

                            if($_SESSION['id']){
                                 $id=$_SESSION['id'];
                                 $sql = "SELECT COUNT(*) FROM complaints WHERE id_person ='$id' and Status='pending' ";
                                 $res=mysqli_query($conn,$sql);
                                 if(mysqli_num_rows($res)){
                                    while($row=mysqli_fetch_row($res)){

                                    echo"<span class='col-md'> <b>Total Pending =" .$row[0]." </b></span>";}

                            }
                            else{
                                echo"<span class='col-md'> <b>Total = </b></span>";
                            }
                        }
                            ?>
                            </center>
      </div>
    </div>
  </body>
  <script src="jquery3.1.4.js"></script>
  <script>
            $(".AllDetails").find(".roomDetails").click(function(e){
              $(".Details").css('display','block');
              $(".BillsDetail").css('display','none');
              $(".Cstatus").css('display','none');
            });

            $(".AllDetails").find(".Bills").click(function(e){
              $(".Details").css('display','none');
              $(".BillsDetail").css('display','block');
              $(".Cstatus").css('display','none');
            });

            $(".AllDetails").find(".status").click(function(e){
              $(".Details").css('display','none');
              $(".BillsDetail").css('display','none');
              $(".Cstatus").css('display','block');
            });

  </script>
  <script type="text/javascript">
    function order() {
      if(confirm("Confirm Room Service Request.")){
        <?php
          $serQ = "Insert into service values('$id', 0, '$roomNo', 'New')";
          $resQ = mysqli_query($conn, $serQ) or die(mysqli_error($conn));
        ?>
      }
    }
  </script>

</html>
