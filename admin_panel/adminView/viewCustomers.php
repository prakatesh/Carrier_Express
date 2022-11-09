<div >
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Name </th>
        <th class="text-center">Mobile</th>
        <th class="text-center">Location</th>
        <th class="text-center">Approx. KM</th>
        <th class="text-center">Vehicle</th>
        <th class="text-center">Labour Count</th>
        <th class="text-center">Date</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from customer_det";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
            
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["name_cus"]?> </td>
      <td><?=$row["mob_cus"]?></td>
      <td><?=$row["location"]?></td>
      <td><?=$row["apox_cus"]?></td>
      <td><?=$row["cho_veh_cus"]?></td>
      <td><?=$row["cho_lab_cus"]?></td>
      <td><?=$row["date"]?></td>
    </tr>
    <?php
            $count=$count+1;
            
        }
    }
    ?>
  </table>