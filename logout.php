<?php
   session_start();
   ob_start();
   
   if(session_destroy()) {
      header("location: index.php");
   }
?>