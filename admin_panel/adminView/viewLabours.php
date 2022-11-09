<div >
  <h2>All Labours</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Name </th>
        <th class="text-center">Mobile</th>
        <th class="text-center">Location</th>
        <th class="text-center">Labour Count</th>
        <th class="text-center">Availability</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from labour_det";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
            
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["name_lab"]?> </td>
      <td><?=$row["mob_lab"]?></td>
      <td><?=$row["location"]?></td>
      <td><?=$row["count_lab"]?></td>
      <td><?=$row["ava_lab"]?></td>
    </tr>
    <?php
            $count=$count+1;
            
        }
    }
    ?>
  </table>