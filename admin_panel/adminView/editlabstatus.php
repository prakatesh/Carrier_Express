<script>
function showlabOrders(location,count_lab,cust_id,name_lab,mob_lab) {
  $.ajax({
    url: "./controller/order_lab.php",
    method: "post",
    data: { record:location,Lab_cnt:count_lab,cust_id:cust_id,name_lab:name_lab,mob_lab:mob_lab },
    success: function (data) {
      alert("Order"); 
      window.location.href="index.php";
      
    },
  });
}

function ChangeOrderStatus(id,location,count_lab,cust_id,name_lab,mob_lab) {
  $.ajax({
    url: "./controller/updatelabstatus.php",
    method: "post",
    data: { lab_id: id },
    success: function (data) {
      showlabOrders(location,count_lab,cust_id,name_lab,mob_lab);
    },
  });
}


</script>

<!-- labour -->
<div>
<h2>All Labour</h2>
  <table class="table ">
    <thead>
	<tr>
		<th>S.no</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Lab_id</th>
        <th>Labour count</th>
		<th>Action</th>
    </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $location=$_POST['record'];
      $lab_cont=$_POST['Lab_cnt'];
      $cust_id=$_POST['cust_id'];
      $sql="SELECT * from labour_det Where location='$location' and count_lab>=$lab_cont";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>

  <td><?=$count?></td>
	<td><?=$row["name_lab"]?> </td>
	<td><?=$row["mob_lab"]?> </td>
  <td><?=$row["lab_id"]?> </td>
	<td><?=$row["count_lab"]?> </td>
  <?php 

            if($row["lab_assign"]==0){
            ?>
                <td><button class="btn btn-danger"  onclick="ChangeOrderStatus('<?=$row['lab_id']?>','<?=$row['location']?>','<?=$row['count_lab']?>','<?=$cust_id?>','<?=$row['name_lab']?>','<?=$row['mob_lab']?>')">Assign </button></td>
            <?php      
                }else{
            ?>
                <td><button class="btn btn-success"  onclick="ChangeOrderStatus('<?=$row['lab_id']?>','<?=$row['location']?>','<?=$row['count_lab']?>','<?=$cust_id?>','<?=$row['name_lab']?>','<?=$row['mob_lab']?>')">Assigned </button></td>
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

























