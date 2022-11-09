<?php 

include 'config.php';

session_start();

error_reporting(0);
if (isset($_SESSION['username'])) {
    header("Location: ../HTML/Home.html");
}
    
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM lab_login WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
        session_start();
        session_destroy();
        header("Location: ../HTML/Lab_Home.html");
	} 
	else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f8e52f3a02.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../CSS/Labour_login.css">
    <!-- Title Icon -->
    <link rel="icon" type="image/x-icon" href="../Image/Header Logo/delivery-truck.png">
    <title>Log In</title>
</head>
<body>
    <section class ="video-bg">
        <header>
            <h2 class="logo">Carrier Express</h2>
            <h2 class="logo">Delivery Partner <b class="text-danger">Login</b></h2>
        </header>
        <video src="../Video/4k-video.mp4" autoplay loop muted></video>
        <div class="overlay"></div>
        <div class="con-body">
            <div class="container">
                <center>
                    <div class="card bg-transparent">
                        <div class="container">
                            <form action="" method="POST" class="login-email">
                                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                                <div class="input-group has-validation">
                                    <input type="email" class="form-control" id="validationCustomUsername" name="email" placeholder="Enter Your Email Id" value="<?php echo $email; ?>"  required>
                                    <div class="invalid-feedback"> Please enter an Email Id.</div>
                                </div><br>
                                <div class="input-group has-validation">
                                    <input type="password" class="form-control" id="validationCustomUsername" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>"  required>
                                    <div class="invalid-feedback"> Please enter a Password.</div>
                                </div><br>
                                <div class="input-group">
                                    <button class="btn btn-primary" name="submit" type="submit" align="center">Login</button>
                                </div><br>
                                <p class="login-register-text">Don't have an account? <a href="Sign_Up.php">Register Here</a>.</p>
                            </form>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </section>
</body>
</html>