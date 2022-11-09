<?php

    include_once "../config/dbconnect.php";
   
    $cust_id=$_POST['cust_id'];
    //echo $order_id;
    $sql = "SELECT * from customer_det where cust_id='$cust_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["cust_ass"]==0){
         $update = mysqli_query($conn,"UPDATE customer_det SET cust_ass=1 where cust_id='$cust_id'");
    }
    else if($row["cust_ass"]==1){
         $update = mysqli_query($conn,"UPDATE customer_det SET cust_ass=0 where cust_id='$cust_id'");
    }
    
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>