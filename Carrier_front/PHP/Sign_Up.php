<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: ../HTML/Home.html");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM lab_login WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO lab_login (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../CSS/Labour_login.css">
    <script src="Packers.js"></script>
    <!-- Title Icon -->
    <link rel="icon" type="image/x-icon" href="../Image/Header Logo/delivery-truck.png">
    <title>Sign Up</title>
</head>
<body>
    <section class ="video-bg">
        <header>
            <h2 class="logo">Carrier Express</h2>
            <h2 class="logo">Delivery Partner <b class="text-danger">Sign Up</b></h2>
        </header>
        <video src="../Video/4k-video.mp4" muted loop autoplay></video>
        <div class="overlay"></div>
        <div class="con-body">
            <div class="container">
                <center>
                    <div class="card bg-transparent">
                        <div class="container">
                            <form action="" method="POST"class="login-email needs-validation" novalidate>
                                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="validationCustomUsername"  placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                                    <div class="invalid-feedback"> Please enter an User Name.</div>
                                </div><br>

                                <div class="input-group has-validation">
                                    <input type="email" class="form-control" id="validationCustomUsername" placeholder="Enter Your Email Id" name="email" value="<?php echo $email; ?>"  required>
                                    <div class="invalid-feedback"> Please enter an Email Id.</div>
                                </div><br>

                                <div class="input-group has-validation">
                                    <input type="password" class="form-control" id="validationCustomUsername" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                                    <div class="invalid-feedback"> Please enter a password.</div>
                                </div><br>

                                <div class="input-group has-validation">
                                    <input type="password" class="form-control" id="validationCustomUsername" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                                    <div class="invalid-feedback"> Please re-enter a password</div>
                                </div><br>
                                <div class="input-group" align="center">
                                    <button class="btn btn-primary sub-but" name="submit" type="submit" onclick="validate_fun()">Sign UP</button>
                                </div><br>
                                <p class="login-register-text">Have an account? <a href="Labour_login.php">Login Here</a>.</p>
                            </form>
                        </div>
                    </div>
                </center>    
            </div>
        </div>
    </section>
</body>
</html>