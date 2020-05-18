<?php
   session_start();
   $id = $_SESSION['id'];
   $room = $_POST['bookRoomButton'];
   if(isset($_POST['confirmButton'])) {
     include("connection.php");
     $query = "UPDATE users,rooms SET users.RoomNo = '$room', users.BookedDate=current_timestamp, rooms.id_person='$id' WHERE users.ID='$id' and rooms.RoomNo='$room'";
     $result2 = mysqli_query($conn, $query) or die(mysqli_error($conn));
     header("location:guestLoggedIn.php");
   }
   if(isset($_POST['cancel'])) {
     header("location:guestNotBookedLoggedIn.php");
   }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quarters Management</title>
    <link rel="stylesheet" href="bookRoom.css">
  </head>
  <body>
    <div class="confirm">
      <span class="please">Please Confirm Your Booking.</span><br><br>
      <span class="roomNo">Room No : <?php echo $room;  ?></span><br><br>
      <form class="confirmBooking" action="" method="post">
        <button type="submit" class="confirmButton" name="confirmButton">Confirm</button>
        <button type="submit" class="cancel" name="cancel">Cancel</button>
      </form>
    </div>
  </body>
</html>
