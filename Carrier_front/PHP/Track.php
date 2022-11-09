<?php
if(isset($_POST['Save21']))
{
    $address1=$_POST['address1'];
    $address1 = str_replace(" ","+",$address1);
    $address2=$_POST['address2'];
    $address2 = str_replace(" ","+",$address2);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/jumbotron/">
    <link rel="icon" type="image/x-icon" href="../Image/Header Logo/delivery-truck.png">
    <title>Location</title>
</head>
</head>
<body>
    <div class="alert alert-success" role="alert">
        <center><h4 class="alert-heading">Check the address pined in map</h4></center>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <h3 class="display-6 fw-bold lh-1 mb-3">Pickup Location</h3>
            <div class="ifram">
                <iframe width = "80%" height = "300px" src="https://maps.google.com/maps?q=<?php echo $address1; ?>&output=embed"></iframe>
            </div>
        </div>    
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <h3 class="display-6 fw-bold lh-1 mb-3">Drop Location</h3>
            <div class="ifram">
                <iframe width = "80%" height = "300px" src="https://maps.google.com/maps?q=<?php echo $address2; ?>&output=embed"></iframe>
            </div>
        </div>
    </div>
    <!-- <div class="alert alert-success" role="alert">
        <p style="font-family:Verdana;">Details of Vechile anad Labours are provided Below<p>
    </div>
    <div class="row align-items-md-stretch">
        <div class="col-md-1"> </div>
        <div class="col-md-5">
        <div class="h-100 p-5 text-white rounded-3">
            <table border="1" class="table table-hover" >
                <h2 style="color:black;">Vehicle</h2>
                <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Vehicle</th>
                    <th>Register</th>
                </tr>
                <?php
                session_start();
                $location =$_SESSION['location'];
                $vehicle= $_SESSION['vehicle'];
                $labour_count=$_SESSION['labour_count'];

                $connect=mysqli_connect('localhost', 'root', '','carrier_express') or die("Connection Failed");
                $query="select vo.name_veh,vo.mob_veh,vo.cho_veh,vo.reg_veh from veh_own_det vo where vo.location='$location' and vo.cho_veh='$vehicle' ";
                $result=mysqli_query($connect,$query);
                while($row1=mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr class="text-danger">
                    <td><?php echo $row1['name_veh']?></td>
                    <td><?php echo $row1['mob_veh']?></td>
                    <td><?php echo $row1['cho_veh']?></td>
                    <td><?php echo $row1['reg_veh']?></td>
                </tr>
                <?php
                }
                ?>
            </table>    
        </div>
      </div>
      <div class="col-md-5">
        <div class="h-100 p-5 bg-light border rounded-3">
            <h2>Labour</h2>
            <table border="1" class="table table-hover">
                <tr>
                    <th>Labour Name</th>
                    <th>Phone number</th>
                    <th>Labour count</th>
                </tr>
                <?php
                $location =$_SESSION['location'];
                $vehicle= $_SESSION['vehicle'];
                $labour_count=$_SESSION['labour_count'];
                $connect=mysqli_connect('localhost', 'root', '','carrier_express') or die("Connection Failed");
                $query="select ld.name_lab,ld.mob_lab,ld.count_lab from labour_det ld where ld.location='$location' and ld.count_lab>=$labour_count ";
                $result=mysqli_query($connect,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr class="text-success">
                    <td><?php echo $row['name_lab']?></td>
                    <td><?php echo $row['mob_lab']?></td>
                    <td><?php echo $row['count_lab']?></td>
                </tr>
                <?php
                }
                ?>
            </table>    
        </div>
      </div>
    </div> -->

</body>
</html>