<div id="CompleteAvailablility">
  <span class="TitleAvail">----Available Rooms----</span>
  <?php
      $query = "SELECT RoomNo, id_person FROM rooms WHERE TotalBeds='$beds' and id_person = -1 ORDER BY RoomNo ASC";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $count = mysqli_num_rows($result);
      if($count != 0) {
        ?><div class="Availability">
          <?php
      while($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="Rooms">
            <span><form action="bookRoom.php" method="post" name="bookForm"><button class="roomNo" name="bookRoomButton" value="<?php echo $row['RoomNo']; ?>"><?php echo $row['RoomNo']; ?></button></form></span>
          </div>
          <?php
      }
      ?></div><?php
    } else {
      ?><br><br>
        <span class="sorry">SORRY, NO ROOMS ARE CURRENTLY AVAILABLE.</span>
      <?php
    }
  ?>
</div>
