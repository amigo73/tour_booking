<?php
  session_start();

  class Database
  {
    // properties
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "blog";

    public function connect()
    {
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

      if($conn->connect_error)
      {
        die("ERROR CONNECTING TO THE DATEBASE ".$conn->connect_error);
      }
      else{
        return $conn;
      }
    }
  }

?>