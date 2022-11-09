<?php

$con = mysqli_connect('localhost', 'root', '','Carrier_express');
      $location=$_POST['record'];
      $vehicle_ty=$_POST['Vehicle'];
      $lab_cont=$_POST['Lab_cnt'];
      $cust_id=$_POST['cust_id'];
      $name_cus=$_POST['name_cus'];
      $mob_cus=$_POST['mob_cus'];
    //echo $order_id;

        $sql="INSERT INTO `order_det` (`name_cus`,`mob_cus`,`cust_id`) VALUES ('$name_cus','$mob_cus','$cust_id')";

        if(mysqli_query($con,$sql)){
            ?>
        <?php
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
    
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>