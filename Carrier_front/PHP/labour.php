<?php

if(isset($_POST['submitl']))
{
$con = mysqli_connect('localhost', 'root', '','carrier_express');

$Name = $_POST['name_lab'];
$Mobile = $_POST['mob_lab'];
$Location = $_POST['location'];
$Lab_cnt = $_POST['count_lab'];
$ava_lab = $_POST['ava_lab'];


$sql = "INSERT INTO `labour_det` (`name_lab`,`mob_lab`, `location`, `count_lab`, `ava_lab`) VALUES ( '$Name', '$Mobile', '$Location', '$Lab_cnt','$ava_lab')";


if(mysqli_query($con,$sql)){
	?>
	<script>
		alert("Thankyou for Register!!");
    location.href='../HTML/Driver_Detail.html';
	</script>
<?php
}

}
?>