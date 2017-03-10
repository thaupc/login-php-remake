<?php
session_start();
ob_start();
include("db.php");

if (!isset($_GET['id'])){
	header("location: a-panel.php");
}
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
                <form action="" method="POST" role="form">
                    <?php 
                        $u_id = $_GET['id'];
                        $name = '';

                        $sql = "Select username FROM members WHERE id=$u_id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $name = $row["username"];
                            }
                        } else {
                            echo $name = "unidentified";
                        }

                        if(isset($_POST['update_btn'])){
                            $u_pass = $_POST['u_pass'];
                            $eu_pass = md5($u_pass);
                            $u_role = $_POST['u_role'];

                            $sql_u = "UPDATE members SET password='$eu_pass', role=$u_role WHERE id=$u_id";
                            if ($conn->query($sql_u) === TRUE) {
                                echo "<div class='alert alert-success'> Account info changed successfully. </div>";
                            } else {
                                echo "<div class='alert alert-danger'> Error updating record: </div>".$conn->error."</div>";
                            }
                        } else{
                            echo "<div class='alert alert-info'> Enter your new information for this account </div>";
                        }
                    ?> 

                    <legend>Update info for account: <?php echo $name; ?></legend>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="u_pass" class="form-control" id="" placeholder="New password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <input type="number" min='1' max='3' name="u_role" class="form-control" id="" placeholder="New role" required>
                    </div>
                    <button type="submit" name="update_btn" class="btn btn-primary">Update</button>
                </form>

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