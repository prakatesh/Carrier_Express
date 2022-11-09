<?php

    include_once "../config/dbconnect.php";
   
    $cus_id=$_POST['record'];
    //echo $order_id;
    $sql = "SELECT order_status from order_det where cust_id='$cus_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["order_status"]==0){
         $update = mysqli_query($conn,"UPDATE order_det SET order_status=1 where cust_id='$cus_id'");
    }
    else if($row["order_status"]==1){
         $update = mysqli_query($conn,"UPDATE order_det SET order_status=0 where cust_id='$cus_id'");
    }
    
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>