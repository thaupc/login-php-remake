<?php
session_start();
ob_start();

if (!isset($_SESSION["admin_session"])){
    header("location: index.php");
} 

include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
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
          echo "<h1>". " Hi Admin, ". $_SESSION['admin_session']."</h1>";
          echo "<p class='lead'>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta illum ullam distinctio fuga, reprehenderit velit voluptates similique minus laboriosam magni non mollitia debitis, iure, molestias quia fugiat repudiandae aliquam ipsam.
            <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti explicabo aperiam molestias culpa, ut quas doloribus inventore veniam incidunt in dolor officiis ad earum delectus, saepe! Temporibus, quidem molestias nobis?
            </p>";
        ?>

      </div>

      <h1>Account Management</h1>

      <?php
        
        $query = "select * from members";
        $result = mysqli_query($conn, $query);
        echo "<table class='table-bordered table-hover'>
                <thread>
                  <tr>
                    <th> ID </th>
                    <th> Username </th>
                    <th> Password </th>
                    <th> Role </th>
                    <th> Management</th>
                  </tr>
                </thread>";

        while($row = mysqli_fetch_array($result)){   
        if ($row['role']==1){
            $role = "admin";
        } elseif ($row['role'] == 2){
            $role = "mod";
        } elseif ($row['role'] == 3){
            $role = "customer";
        }
        echo  "<tr><td>".$row['id'].
              "</td><td>".$row['username'].
              "</td><td>".$row['password'].
              "</td><td>".$role.
              "</td><td> <a href='delete.php?id={$row['id']}'>Delete</a> - <a href='update.php?id={$row['id']}'>Update</a>".
              "</td></tr>";
        }
        echo "</table>";
      ?>


      </div>

      </section>

    <footer class="footer">
    &copy Hau (hautn.nz@gmail.com)
    </footer>
    
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    </body>
</html>