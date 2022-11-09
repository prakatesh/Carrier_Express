
      <script>
        
        function myFunction(){
          alert("Thankyou!!");
        }
      </script>
<?php
?>
</script>
<?php
$conn = mysqli_connect('localhost', 'root', '','Carrier_express');
      $location=$_POST['record'];
      $lab_cont=$_POST['Lab_cnt'];
      $cust_id=$_POST['cust_id'];
      $name_lab=$_POST['name_lab'];
      $mob_lab=$_POST['mob_lab'];
    //echo $order_id;

    $sql = "SELECT * from order_det where cust_id='$cust_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["cust_id"]==$cust_id){
         $update = mysqli_query($conn,"UPDATE order_det SET name_lab='$name_lab',mob_lab='$mob_lab',count_lab='$lab_cont',location='$location' where cust_id='$cust_id'");
    }
?>