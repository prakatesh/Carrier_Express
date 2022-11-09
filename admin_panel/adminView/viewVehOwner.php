<div >
  <h2>All Vehicle Owners</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Name </th>
        <th class="text-center">Mobile</th>
        <th class="text-center">Location</th>
        <th class="text-center">Vehicle</th>
        <th class="text-center">Availability</th>
        <th class="text-center">Licensce No.</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from veh_own_det";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
            
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["name_veh"]?> </td>
      <td><?=$row["mob_veh"]?></td>
      <td><?=$row["location"]?></td>
      <td><?=$row["cho_veh"]?></td>
      <td><?=$row["ava_veh"]?></td>
      <td><?=$row["reg_veh"]?></td>
    </tr>
    <?php
            $count=$count+1;
            
        }
    }
    ?>
  </table>