<?php

    include_once "../config/dbconnect.php";
   
    $veh_id=$_POST['veh_id'];
    //echo $order_id;
    $sql = "SELECT * from veh_own_det where veh_id='$veh_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["veh_assign"]==0){
         $update = mysqli_query($conn,"UPDATE veh_own_det SET veh_assign=1 where veh_id='$veh_id'");
    }
    else if($row["veh_assign"]==1){
         $update = mysqli_query($conn,"UPDATE veh_own_det SET veh_assign=0 where veh_id='$veh_id'");
    }
    
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>