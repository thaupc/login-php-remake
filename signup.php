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
	<title>Signup</title>
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
						echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
				  } 			      	
			      ?>
			    </ul>
			  </div>
			</nav>

			<script type="text/javascript">
					  function checkForm(form)
					  {
					    if(form.form_newname.value == "") {
					      alert("Error: Username cannot be blank!");
					      form.form_newname.focus();
					      return false;
					    }
					    re = /^\w+$/;
					    if(!re.test(form.form_newname.value)) {
					      alert("Error: Username must contain only letters, numbers and underscores!");
					      form.form_newname.focus();
					      return false;
					    }

					    if(form.form_newpass.value != "" && form.form_newpass.value == form.form_newpass2.value) {
					      if(form.form_newpass.value.length < 6) {
					        alert("Error: Password must contain at least six characters!");
					        form.form_newpass.focus();
					        return false;
					      }
					      if(form.form_newpass.value == form.form_newname.value) {
					        alert("Error: Password must be different from Username!");
					        form.form_newpass.focus();
					        return false;
					      }
					      re = /[0-9]/;
					      if(!re.test(form.form_newpass.value)) {
					        alert("Error: password must contain at least one number (0-9)!");
					        form.form_newpass.focus();
					        return false;
					      }
					      re = /[a-z]/;
					      if(!re.test(form.form_newpass.value)) {
					        alert("Error: password must contain at least one lowercase letter (a-z)!");
					        form.form_newpass.focus();
					        return false;
					      }
					      re = /[A-Z]/;
					      if(!re.test(form.form_newpass.value)) {
					        alert("Error: password must contain at least one uppercase letter (A-Z)!");
					        form.form_newpass.focus();
					        return false;
					      }

					      if(document.getElementById('agree').checked) { return true; } else { alert('Make sure you agree with Terms and Conditions'); return false; }

					    } else {
					      alert("Error: Please check that you've entered and confirmed your password!");
					      form.form_newpass.focus();
					      return false;
					    }
					    return true;
					  }
			</script>


			<form action="" method="POST" role="form" onsubmit="return checkForm(this);">
				<legend>SIGNUP</legend>

				<div>
					<?php 
						if(!empty($_POST)){
								$n_username = $_POST["form_newname"];
								clean_input($n_username);
								$n_password = $_POST["form_newpass"];
								clean_input($n_password);
								$e_pass= md5($n_password);

								if ($n_username == "" || $n_password == "") {
								    echo "<div class='alert alert-danger'> Please fill in both username and password </div>";
								} else{
									$sql = "INSERT INTO members (username, password, role) VALUES ('$n_username', '$e_pass', '3')";
									if (mysqli_query($conn, $sql)) {
								    	echo "<div class='alert alert-success'> Account is created successfully. Go back to Homepage in 3 secs</div>";
								    	echo "<meta http-equiv='refresh' content='3;url=index.php' />";
									} else {
								    	echo "<div class='alert alert-danger'> ";
								    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
								    	echo "</div>";
									}
								}
						 
						} else {
							echo "<div class='alert alert-info'> Enter info for your new account </div>";
						}
					?>
				</div>
		
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" name="form_newname" class="form-control" id="" placeholder="Enter desired username">
				</div>

				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="form_newpass" class="form-control" id="" placeholder="Enter desired password">
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="form_newpass2" class="form-control" id="" placeholder="Reenter password">
				</div>

				<div class="form-group">
					<label for="">Terms and Conditions: </label>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. A blanditiis quidem voluptatem, non magnam in fugiat, dicta, deserunt aut ab dolorem debitis voluptatibus quis minima aspernatur consectetur pariatur beatae repellat!
						<br>
					<input type="checkbox" name="checkbox" value="check" id="agree"> I read and agreed.
				</div>

				<div class="row">
					<div class="col-md-4">
						<button type="submit" name="submit-btn" class="btn btn-primary">Submit</button>
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