<script>
function vehicleAss(location,cho_veh_cus,cho_lab_cus,cust_id) {
  $.ajax({
    url: "./adminView/editVariationForm.php",
    method: "post",
    data: {record:location,Vehicle:cho_veh_cus,Lab_cnt:cho_lab_cus,cust_id:cust_id},
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}
function updatecusassign1(location,cho_veh_cus,cho_lab_cus,cust_id) {
  $.ajax({
    url: "./controller/updatecusassign.php",
    method: "post",
    data: {record:location,Vehicle:cho_veh_cus,Lab_cnt:cho_lab_cus,cust_id:cust_id},
    success: function (data) {
      $(".allContent-section").html(data);
      vehicleAss(location,cho_veh_cus,cho_lab_cus,cust_id);
    },
  });
}

function variationEditForm(location,cho_veh_cus,cho_lab_cus,cust_id,name_cus,mob_cus) {
  $.ajax({
    url: "./controller/order_cust.php",
    method: "post",
    data: {record:location,Vehicle:cho_veh_cus,Lab_cnt:cho_lab_cus,cust_id:cust_id,name_cus:name_cus,mob_cus:mob_cus},
    success: function (data) {
      $(".allContent-section").html(data);
      updatecusassign1(location,cho_veh_cus,cho_lab_cus,cust_id);
    },
  });
}

</script>
<div >
  <h2>Assigning Vehicles</h2>
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
        <th class="text-center" >Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      
      $sql="SELECT * from customer_det";
      //   $sql="SELECT * from customer_det WHERE DATE(NOW())=date;";
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
      <?php 
      if($row["cust_ass"]==0){
      ?>
          <td><button class="btn btn-danger"  onclick="variationEditForm('<?=$row['location']?>','<?=$row['cho_veh_cus']?>','<?=$row['cho_lab_cus']?>','<?=$row['cust_id']?>','<?=$row['name_cus']?>','<?=$row['mob_cus']?>')">Assign </button></td>
      <?php      
          }else{
      ?>
          <td><button class="btn btn-success"  onclick="variationEditForm('<?=$row['location']?>','<?=$row['cho_veh_cus']?>','<?=$row['cho_lab_cus']?>','<?=$row['cust_id']?>','<?=$row['name_cus']?>','<?=$row['mob_cus']?>')">Assigned </button></td>
          <?php
          }
      ?>
      <!-- <td><button class="btn btn-primary" style="height:40px" onclick="variationEditForm('<?=$row['location']?>','<?=$row['cho_veh_cus']?>','<?=$row['cho_lab_cus']?>','<?=$row['cust_id']?>','<?=$row['name_cus']?>','<?=$row['mob_cus']?>')">Assign</button></td> -->
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>
  
</div>
   