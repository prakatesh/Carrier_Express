
<?php
$servername="localhost";
$username="root";
$password="";
$database_name="carrier_express";
$conn=mysqli_connect($servername,$username,$password,$database_name);

session_start();

if(!$conn){
    die("Connection failed:".mysqli_connect_error());
}
if(isset($_POST['Save'])){
    $name_cus=$_POST['name_cus'];
    $mob_cus=$_POST['mob_cus'];
    $location = $_POST['location'];
    $apox_cus = $_POST['apox_cus'];
    $cho_veh_cus = $_POST['cho_veh_cus'];
    $cho_lab_cus = $_POST['cho_lab_cus'];
    $date = $_POST['date'];

    $_SESSION['location'] = $_POST['location'];
    $_SESSION['vehicle'] =  $_POST['cho_veh_cus'];
    $_SESSION['labour_count'] =  $_POST['cho_lab_cus'];
    $sql_query="INSERT INTO customer_det (name_cus,mob_cus,location,apox_cus,cho_veh_cus,cho_lab_cus,date)
    VALUES ('$name_cus','$mob_cus','$location','$apox_cus','$cho_veh_cus','$cho_lab_cus','$date')";
    if(mysqli_query($conn,$sql_query)){
    }
    else
    {
        echo "die";
        ?>
            <script>
                alert("<?php  echo "ERROR ...! :". $sql . " " . mysqli_error($conn); ?>");
            </script>
        <?php
    } 
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="D:\Visual Studio\WEB\SIG PROJECT\Image\Logo\link-logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS File Import -->
        <link rel="stylesheet" href="../CSS/Order.css">
    <!-- JavaScript File Import -->
        <script type="text/javascript" src="../JS/Order.js"></script>
    <link rel="icon" type="image/x-icon" href="../Image/Header Logo/delivery-truck.png">
    <title>Order</title>
</head>
<body background="../Image/Order/backround.jpg"><br><br><br>
  <div class="row mt-3 mx-3" style="margin-top:25px ;">
    <div class="col-md-3">
      <div style="margin-top: 400px; margin-left: 10px;" class="text-center">
        <i id="animationDemo" data-mdb-animation="slide-right" data-mdb-toggle="animation"
          data-mdb-animation-reset="true" data-mdb-animation-start="onScroll"
          data-mdb-animation-on-scroll="repeat" class="fas fa-3x fa-shipping-fast text-white"></i>
        <h3 class="mt-3 text-white">Welcome</h3>
        <p class="white-text">You are 30 seconds away from completing your order!</p>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-white btn-rounded back-button"  onclick="fun()">Go back</button><br><br><br>
      </div>
  
  
    </div>
    <div class="col-md-9 justify-content-center">
      <div class="card card-custom pb-4">
        <div class="card-body mt-0 mx-5">
          <div class="text-center mb-3 pb-2 mt-3">
            <h4 style="color: #495057 ;">Delivery Details</h4>
          </div>
  
          <form  action="../HTML/Success.html" method="post" class="needs-validation" novalidate>
  
            <div class="row mb-4">
              <div class="col-md-6">
                <div class="form-outline">
                  <label class="form-label" for="Order-form-1">Name</label>
                  <input type="text" id="Order-form-1" class="form-control input-custom" value="<?php
                  
        echo "$name_cus" ?> 

                  " disabled/>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <label class="form-label" for="Order-form-2">Phone number</label>
                  <input type="text" id="Order-form-2" class="form-control input-custom" value="<?php
                  
                  echo "$mob_cus" ?> 
          
                            " disabled/>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-6">
                <div class="form-outline">
                  <label class="form-label" for="Order-form-3">Location</label>
                  <input type="text" id="Order-form-3" class="form-control input-custom" value="<?php
                  
                  echo "$location" ?> 
          
                            " disabled/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-outline">
                  <label class="form-label" for="Order-form-4">ApproxKilometer</label>
                  <input type="text" id="Order-form-4" class="form-control input-custom" value="<?php
                  
                  echo "$apox_cus" ?> 
          
                " disabled/>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <label class="form-label" for="Order-form-5">Vehicle Type</label>
                  <input type="text" id="Order-form-5" class="form-control input-custom" value="<?php
                  
                  echo "$cho_veh_cus" ?> 
          
                " disabled/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-outline">
                  <label class="form-label" for="Order-form-5">Labour Count</label>
                  <input type="text" id="Order-form-5" class="form-control input-custom" value="<?php
                  
                  echo "$cho_lab_cus" ?> 
          
                " disabled/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col">
                <div class="form-outline">
                  <label class="form-label" for="Order-form-6">Date</label>
                  <input type="text" id="Order-form-6" class="form-control input-custom" value="<?php
                  
                  echo "$date" ?> 
          
                " disabled/>
                </div>
              </div>
              <div class="col-md-2"></div>
            </div><br>
        <!-- Location -->
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="Order-form-7">Pick Up Address</label>
                    <input type="text" id="Order-form-6"  name="address1" class="form-control input-custom" placeholder="Enter Full Address">
                    <div class="invalid-feedback">
                        Please enter a Address.
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-outline">
                    <label class="form-label" for="Order-form-8">Delivery Address</label>
                    <input type="text" id="Order-form-7" name="address2" class="form-control input-custom" placeholder="Enter Full Address">
                    <div class="invalid-feedback">
                        Please enter a Address.
                    </div>
                  </div>
                </div>
              </div>
            <div class="float-end" align="center">
              <button type="submit"  name="Save21" class="btn btn-primary btn-rounded"
                style="background-color: #0062CC ;"  onclick="validate_fun()">Place order</button>
            </div>
  
          </form>
        </div>
      </div>
    </div>
  </div><br><br><br>
    <footer class="bg-dark text-center text-white">
        <div class="row">
            <div class="col-md-3">
                <h1 style="font-weight: bolder;">HEY SERVICE</h1>
                <h3>Send anything, anywhere, anytime</h3>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <h4>Company</h4>
                </div>
                <div class="row">
                    <p>About Us</p>
                </div>
                <div class="row">
                    <p>Offers</p>
                </div>
                <div class="row">
                    <p>Blogs</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <h4>Servics</h4>
                </div>
                <div class="row">
                    <p>City Tempo</p>
                </div>
                <div class="row">
                    <p>For Enterprise</p>
                </div>
                <div class="row">
                    <p>Packers&Movers</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <h4>Support</h4>
                </div>
                <div class="row">
                    <p>Contact Us</p>
                </div>
                <div class="row">
                    <p>Privacy Policy</p>
                </div>
                <div class="row">
                    <p>Terms of Service</p>
                </div>
            </div>
        </div>
        <div class="row rel">
            <div class="col-md-3">
                <div class="row">
                    <h4 style="font-weight: bolder;">We are here</h4>
                </div>
                <div class="row">
                    <p>Mumbai</p>
                </div>
                <div class="row">
                    <p>Lucknow</p>
                </div>
                <div class="row">
                    <p>Vadodra</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <p>Delhi NCR</p>
                </div>
                <div class="row">
                    <p>Jaipur</p>
                </div>
                <div class="row">
                    <p>Coimbatore</p>
                </div>
                <div class="row">
                    <p>Salem</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <p>Bangalore</p>
                </div>
                <div class="row">
                    <p>Pune</p>
                </div>
                <div class="row">
                    <p>Indore</p>
                </div>
                <div class="row">
                    <p>Hyderabad</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <p>Kolkata</p>
                </div>
                <div class="row">
                    <p>Nagpur</p>
                </div>
                <div class="row">
                    <p>Chennai</p>
                </div>
                <div class="row">
                    <p>surat</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
