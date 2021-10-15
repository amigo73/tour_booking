<?php

    include '../class/user.php';

    if(isset($_POST["submit"]))
    {
      //input
      $username = $_POST["username"];
      $password = $_POST["password"];

      $user = new User();
      $user->login($username,$password);
  
    }
?>