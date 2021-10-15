<?php
  require_once 'database.php';

  class User extends Database
  {
    private $conn;
    private $account_id;
    private $firstname;
    private $lastname;
    private $username;
    private $adress;
    private $contact_number;

    public function __construct($account_id = NULL)
    {
      $this->conn = $this->connect();

      if($account_id != NULL)
      {
        $sql = "SELECT accounts.account_id, username, password, role, user_id, first_name, last_name, address, contact_number,avatar, bio FROM accounts INNER JOIN users ON accounts.account_id = users.account_id WHERE accounts.account_id = $account_id";


        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0)
        {
          $user = $result->fetch_assoc();
          $this->account_id = $user["account_id"];
          $this->firstname = $user["first_name"];
          $this->lastname = $user["last_name"];
          $this->username = $user["username"];
          $this->address = $user["address"];
          $this->contact_number = $user["contact_number"];
        }
      }
    }
    public function register($firstname, $lastname, $address, $contact_number,$username, $password)
    {

      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO accounts(username,password) VALUES('$username','$hashed_password')";
      
      if($this->conn->query($sql))
      {
        // echo "INSERT SUCCESSFUL";
        $account_id = $this->conn->insert_id;

        $sql = "INSERT INTO users(first_name, last_name, address, contact_number, account_id) VALUES ('$firstname', '$lastname', '$address', '$contact_number',$account_id)";

        if($this->conn->query($sql))
        {
          $_SESSION["success"] = 1;
          $_SESSION["message"] = "Registration Successful.";
          header("Location:../index.php");
        }
        else
        {
          $_SESSION["success"] = 0;
          $_SESSION["message"] ="Registration Failed. Kindly try again.";
          header("Location:../register.php");
        }

      }
      else
      {
        $_SESSION["success"] = 0;
          $_SESSION["message"] ="Registration Failed. Kindly try again.";
        header("Location:../index.php?");
      }
    }

    public function login($username,$password)
      {
          $sql = "SELECT accounts.account_id, username, password, role, user_id, first_name, last_name, address, contact_number,avatar, bio FROM accounts INNER JOIN users ON accounts.account_id = users.account_id WHERE username = '$username'";
          
          $result = $this->conn->query($sql);

          if($result && $result->num_rows==1)
          {
            $user = $result->fetch_assoc();

            if(password_verify($password,$user["password"]))
            {
                $_SESSION["account_id"] = $user["account_id"];
                $_SESSION["firstname"] = $user["first_name"];
                $_SESSION["lastname"] = $user["last_name"];
                $_SESSION["role"] = $user["role"];

                if($user["role"]=="A")
                {
                  header("Location: ../dashboard.php");
                }
                elseif($user["role"]=="U")
                {
                  header("Location: ../profile.php");
                }
            }
            else
            {
              $_SESSION["success"] = 0;
              $_SESSION["message"] = "Incorrect password" ;
              header("Location: ../index.php");
            }
          }
          else
          {
            $_SESSION["success"] = 0;
            $_SESSION["message"] = "Incorrect username" ;
            header("Location: ../index.php?");
          }
      }

      public function getAccountID()
      {
        return $this->account_id;
      }
      public function getFirstName()
      {
        return $this->firstname;
      }
      public function getLastName()
      {
        return $this->lastname;
      }
      public function getUserName()
      {
        return $this->username;
      }
      public function getAddress()
      {
        return $this->address;
      }
      public function getContactNumber()
      {
        return $this->contact_number;
      }
      public function displayFullNameAsOptions($account_id = NULL)
      {
        $sql = "SELECT accounts.account_id, username,first_name,last_name FROM accounts INNER JOIN users ON accounts.account_id=users.account_id";
        $result = $this->conn->query($sql);

        if($result && $result->num_rows > 0)
        {
          if($account_id == NULL)
          {
            echo "<option selected disabled>Select Author</option>";
          }

          while($row = $result->fetch_assoc())
          {
            if($account_id == $row["account_id"])
            {
              echo "<option value='".$row["account_id"]."' selected>".$row["first_name"]." ".$row["last_name"]."(".$row["username"].")</option>";
            }
            else{
              "<option value='".$row["account_id"]."'>".$row["first_name"]." ".$row["last_name"]." (".$row["username"].")</option>";
            }      
          }
        }
        else
        {
            echo "<option selected disabled> NO records to display</option>";
        }
      }
  }
?>