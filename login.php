<?php
session_start();
ob_start();

require("db.php"); 
require("functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	</head>
<body>
<section class="main">
	<div id="container">
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="index.php">Login Testing</a>
			    </div>			    
			    <ul class="nav navbar-nav navbar-right">
			      <?php
			      if (empty($_SESSION)){
						echo "<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
				  } 			      	
			      ?>
			    </ul>
			  </div>
			</nav>

			<form action="" method="POST" role="form">
				<legend>LOGIN</legend>

				<div>
					<?php 
						if(!empty($_POST)){
							$username = $_POST["form-username"];
							$password = $_POST["form-password"];
							$d_pass = md5($password);

							$sql = "select * from members where username = '$username' and password = '$d_pass'";
							$row = mysqli_query($conn, $sql);
							$num_row = mysqli_num_rows($row);

							if($num_row==0){
							    echo "<div class='alert alert-danger'> Wrong username or password. Please re-enter. </div>";
							} else{
							        
							    //set session for each type of login
							    $sqla = "select role from members where username = '$username'";    
							    $get_role = $conn->query($sqla);
							    $role = $get_role->fetch_assoc();
							    if ($role["role"] == 1){
							        $_SESSION["admin_session"]=$username;
							        header("location: index.php");   
							    } elseif ($role["role"] == 2){
							        $_SESSION["mod_session"]=$username;
							        header("location: index.php");
							    } elseif ($role["role"] == 3){
							        $_SESSION["customer_session"]=$username;
							        header("location: index.php");
							    }

							} 
						} else {
							echo "<div class='alert alert-info'> Please enter username and password to login </div>";
						}
					?>
				</div>
		
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" name="form-username" class="form-control" id="" placeholder="Input field">
				</div>

				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="form-password" class="form-control" id="" placeholder="Input field">
				</div>		

				<div class="row">
					<div class="col-md-4">
						<button type="submit" name="submit-btn" class="btn btn-primary">Submit</button>
					</div>
					<div class="col-md-4">
						<a href="signup.php" class="btn btn-link">Sign up new account</a>
					</div>
					<div class="col-md-4">
						<a href="forgot.php" class="btn btn-link">Forgot your password?</a>
					</div>

				</div>

			</form>
	</div>

</section>

<footer class="footer">
&copy Hau (hautn.nz@gmail.com)
</footer>

<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>