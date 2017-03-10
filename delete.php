<?php
session_start();
ob_start();

include('db.php');

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
	              <ul class="nav navbar-nav">
	              <?php 
	                  if (isset($_SESSION["admin_session"])){
	                  echo " <li class='active'><a href='a-panel.php'>Admin Panel</a></li> ";
	              } 
	              ?>
	              </ul>
	              <ul class="nav navbar-nav navbar-right">
	                <?php
	                if (!empty($_SESSION)){
	                echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
	              } 
	                ?>
	              </ul>
	            </div>
          	</nav>
          	<div>
          	<?php

          	if (isset($_GET['id'])){
				$d_id = $_GET['id'];
				$sql = "DELETE FROM members WHERE id=$d_id";
				if ($conn->query($sql) === TRUE) {
			    	echo "<div class='alert alert-success'>
			    	      Record deleted successfully. Go back to Admin Panel in 3 secs.
			    	      </div>";
			    	echo "<meta http-equiv='refresh' content='3;url=a-panel.php' />";
				} 
				else {
					echo "<div class='alert alert-danger'>";
			    	echo "Error deleting record: " . $conn->error;	
			    	echo "</div>";
				}
			} 
			else{
				header ("Location: a-panel.php");
			}
          	?>

          	</div>



			
	</div>

</section>

<footer class="footer">
&copy Hau (hautn.nz@gmail.com)
</footer>

<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>
