<?php
  session_start();

  if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin')
    header('location:registrations.php');
  else
    header('location:login.php');
?>