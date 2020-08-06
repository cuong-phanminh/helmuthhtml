<?php
   session_start();
   unset($_SESSION["username"]);
   echo 'You have successfully logged out';
   header('Refresh: 2; URL = login.php');
?>