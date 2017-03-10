<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
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

					if (isset($_SESSION["mod_session"])){
					    echo " <li class='active'><a href='m-panel.php'>Mod Panel</a></li> ";
					}
					?>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			      <?php
			      if (empty($_SESSION)){
						echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
						echo "<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
				  } 
			      	if (!empty($_SESSION)){
						echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
				  } 
			      ?>
			    </ul>
			  </div>
			</nav>

			<div class="col md-4">
				<?php
			      if (empty($_SESSION)){
						echo "<h4>Hi, this is Login Testing mockup by HN</h4>
				Using your username and password below.

				<table class='table table-hover'>
			    <thead>
			      <tr>
			        <th>Username</th>
			        <th>Password</th>
			        <th>Role</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>admin</td>
			        <td>admin</td>
			        <td>Admin (1)</td>
			      </tr>
			      <tr>
			        <td>hau</td>
			        <td>hau</td>
			        <td>Mod (2)</td>
			      </tr>
			      <tr>
			        <td>harry</td>
			        <td>harry</td>
			        <td>Customer (3)</td>
			      </tr>
			    </tbody>
		  </table> ";
				  } 
			     if (!empty($_SESSION)){
						if (isset($_SESSION["admin_session"])){
						    echo "<h1>";
						    echo " Hi Admin, ". $_SESSION['admin_session'];
						    echo "</h1>";
						} 
						if (isset($_SESSION["mod_session"])){
						    echo "<h1>";
						    echo " Hi Mod, ". $_SESSION['mod_session'];
						    echo "</h1>";
						}
						if (isset($_SESSION["customer_session"])){
						   echo "<h4>";
						   echo " Hi Customer, ". $_SESSION['customer_session'];
						   echo "</h1>";
						}

						echo "<p class='lead'>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta illum ullam distinctio fuga, reprehenderit velit voluptates similique minus laboriosam magni non mollitia debitis, iure, molestias quia fugiat repudiandae aliquam ipsam.
						<br>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti explicabo aperiam molestias culpa, ut quas doloribus inventore veniam incidunt in dolor officiis ad earum delectus, saepe! Temporibus, quidem molestias nobis?
						</p>";
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