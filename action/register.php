<?php
  include '../class/user.php';

  if(isset($_POST["submit"]))
  {
    // input
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $address = $_POST["address"];
    $contact_number = $_POST["contact_number"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // instantiation
    $user = new User();
    $user->register($firstname,$lastname,$address,$contact_number,$username,$password);
    
  }
?>