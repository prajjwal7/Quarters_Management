<?php
  session_start();
  include('connection.php');
  $id = $_SESSION['id'];
  $q = "SELECT Status from users WHERE ID = '$id'";
  $r = mysqli_query($conn, $q) or die(mysqli_error($conn));
  $rowS = mysqli_fetch_assoc($r);
  $beds = 0;
  switch ($rowS['Status']) {
    case 'HOD':
      $beds = 1;
      break;
    case 'Assosiate Professor':
      $beds = 1;
      break;
    case 'Assistant Professor':
      $beds = 1;
      break;
    case 'Ad-Hoc':
      $beds = 2;
      break;
    case 'Management Staff':
      $beds = 2;
      break;
    default:
      $beds = 0;
      break;
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quarter's Management</title>
    <link rel="stylesheet" href="loggedInNotBooked.css">
    <link rel="stylesheet" href="Availability.css">
  </head>
  <body>
    <header>
      <ul>
        <li><span>Welcome, <?php echo $_SESSION['un']; ?></span></li>
        <li><a href="#CompleteAvailablility" name="avail" value="<?php echo $_SESSION['id']; ?>">Availability</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
    </header>
    <div class="bookAQuarter">
      <span class="hello">Hello, <?php echo $_SESSION['un']; ?></span><br><br><br>
      <span class="nobook">Seems like you haven't booked a room.</span><br>
      <span class="book">Book One Now!!!</span><br>
      <button type="button" name="avail"><a href="#CompleteAvailablility">Book Now!</a></button>
    </div>
    <?php include("Availability.php"); ?>
  </body>
</html>
