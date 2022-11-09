<?php

$conn = mysqli_connect('localhost', 'root', '','Carrier_express');
      $location=$_POST['record'];
      $vehicle_ty=$_POST['Vehicle'];
      $lab_cont=$_POST['Lab_cnt'];
      $cust_id=$_POST['cust_id'];
      $name_veh=$_POST['name_veh'];
      $mob_veh=$_POST['mob_veh'];
    //echo $order_id;

    $sql = "SELECT * from order_det where cust_id='$cust_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["cust_id"]==$cust_id){
         $update = mysqli_query($conn,"UPDATE order_det SET name_veh='$name_veh',mob_veh='$mob_veh',cho_veh='$vehicle_ty' where cust_id='$cust_id'");
    }





//     $sql = "SELECT * from labour_det where lab_id='$lab_id'"; 
//     $result=$conn-> query($sql);
//   //  echo $result;

//     $row=$result-> fetch_assoc();
    
//    // echo $row["pay_status"];
    
//     if($row["lab_assign"]==0){
//          $update = mysqli_query($conn,"UPDATE labour_det SET lab_assign=1 where lab_id='$lab_id'");
//     }
//     else if($row["lab_assign"]==1){
//          $update = mysqli_query($conn,"UPDATE labour_det SET lab_assign=0 where lab_id='$lab_id'");
//     }
?>