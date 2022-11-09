<?php

    include_once "../config/dbconnect.php";
   
    $lab_id=$_POST['lab_id'];
    //echo $order_id;
    $sql = "SELECT * from labour_det where lab_id='$lab_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["lab_assign"]==0){
         $update = mysqli_query($conn,"UPDATE labour_det SET lab_assign=1 where lab_id='$lab_id'");
    }
    else if($row["lab_assign"]==1){
         $update = mysqli_query($conn,"UPDATE labour_det SET lab_assign=0 where lab_id='$lab_id'");
    }
    
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>