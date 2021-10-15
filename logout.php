<?php
  session_start();
  session_unset();
  session_destroy();
  header("Location:index.php");

  //destroys the session variable and then redirects to the login page.
?>