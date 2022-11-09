<?php

if(isset($_POST['submitv']))
{
$con = mysqli_connect('localhost', 'root', '','carrier_express');

$name = $_POST['name_veh'];
$mobile = $_POST['mob_veh'];
$location = $_POST['location'];
$cho_veh = $_POST['cho_veh'];
$ava_veh = $_POST['ava_veh'];
$reg_veh = $_POST['reg_veh'];


$sql = "INSERT INTO `veh_own_det` (`name_veh`,`mob_veh`, `location`, `cho_veh`, `ava_veh`, `reg_veh` ) VALUES ( '$name', '$mobile', '$location', '$cho_veh','$ava_veh', '$reg_veh')";



if(mysqli_query($con, $sql))
{
    ?>
    <script>
        location.href='../HTML/Driver_Detail.html';
    </script>
	
    <?php

}
}
?>