<?php

// check session to redirect to index page after logged

if (isset($_SESSION["admin_session"])){
    header("location: index.php");
} 
if (isset($_SESSION["mod_session"])){
    header("location: index.php");
}
if (isset($_SESSION["customer_session"])){
    header("location: index.php");
} 

?>