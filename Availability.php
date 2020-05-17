<div id="CompleteAvailablility">
  <span class="TitleAvail">----Available Rooms----</span>
  <?php
      $query = "SELECT RoomNo, id_person FROM rooms WHERE TotalBeds=2 and id_person = 1 ORDER BY RoomNo";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $count = mysqli_num_rows($result);
      if($count != 0) {
        ?><div class="Availability"><?php
      while($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="Rooms">
            <span><a class="roomNo" href = "#bookRoom"><?php echo $row['RoomNo']; ?></a></span>
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
