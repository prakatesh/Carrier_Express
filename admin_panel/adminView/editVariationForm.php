<script>
function showlabOrders(location,count_lab,cust_id) {
  $.ajax({
    url: "./adminView/editlabstatus.php",
    method: "post",
    data: { record: location,cust_id:cust_id,Lab_cnt:count_lab },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function orderveh(id,location,count_lab,vehicle_ty,cust_id,name_veh,mob_veh) {
  $.ajax({
    url: "./controller/order_veh.php",
    method: "post",
    data: {record:location,Vehicle:vehicle_ty,Lab_cnt:count_lab,cust_id:cust_id,name_veh:name_veh,mob_veh:mob_veh },
    success: function (data) {
      showlabOrders(location,count_lab,cust_id);
    },
  });
}


function ChangeOrderStatus(id,location,count_lab,vehicle_ty,cust_id,name_veh,mob_veh) {
  $.ajax({
    url: "./controller/updatevehstatus.php",
    method: "post",
    data: { veh_id: id },
    success: function (data) {
      orderveh(id,location,count_lab,vehicle_ty,cust_id,name_veh,mob_veh);
    },
  });
}

</script>

<div >
  <h2>All Vehicle</h2>
  <table class="table ">
    <thead>
	<tr>
		<th>S.no</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Vehicle</th>
        <th>Veh_id</th>
        <th>Register</th>
		<th>Action</th>

    </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $location=$_POST['record'];
      $vehicle_ty=$_POST['Vehicle'];
      $lab_cont=$_POST['Lab_cnt'];
      $cust_id=$_POST['cust_id'];
      $sql="SELECT * from veh_own_det Where location='$location'and cho_veh='$vehicle_ty'";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
            
    ?>
    <tr>
    <td><?=$count?></td>
	<td><?=$row["name_veh"]?> </td>
	<td><?=$row["mob_veh"]?> </td>
	<td><?=$row["cho_veh"]?> </td>
  <td><?=$row["veh_id"]?> </td>
    <td><?=$row["reg_veh"]?> </td>
           <?php 
                if($row["veh_assign"]==0){                
            ?>
                <td><button class="btn btn-danger"  onclick="ChangeOrderStatus('<?=$row['veh_id']?>','<?=$row['location']?>','<?=$lab_cont?>','<?=$row['cho_veh']?>','<?=$cust_id?>','<?=$row['name_veh']?>','<?=$row['mob_veh']?>')">Assign </button></td>
            <?php      
                }else{
            ?>
                <td><button class="btn btn-success"  onclick="ChangeOrderStatus('<?=$row['veh_id']?>','<?=$row['location']?>','<?=$lab_cont?>','<?=$row['cho_veh']?>','<?=$cust_id?>','<?=$row['name_veh']?>','<?=$row['mob_veh']?>')">Assigned</button></td>
                <?php
                }
            ?>
    </tr>
    <?php
            $count=$count+1;
        }
    }
    ?>
  </table>

</div>