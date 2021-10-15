<?php
  require_once 'database.php';

  class Post extends Database
  {
    private $conn;
    private $post_id;
    private $post_title;
    private $post_message;
    private $category_id;
    private $category_name;
    private $author;
    private $author_id;
    private $date_posted;

    public function __construct($post_id = NULL)
    {
      $this->conn = $this->connect();

      if($post_id != NULL)
      {
        $sql = "SELECT post_id, post_title, post_message,date_posted, first_name, last_name, categories_name, categories.categories_id, users.account_id FROM posts INNER JOIN users ON users.account_id = posts.account_id INNER JOIN categories ON categories.categories_id = posts.category_id WHERE post_id = $post_id";

        $result = $this->conn->query($sql);

        if($result && $result->num_rows>0)
        {
          $post = $result->fetch_assoc();

          $this->post_id = $post["post_id"];
          $this->post_title = $post["post_title"];
          $this->post_message = $post["post_message"];
          $this->category_name = $post["categories_name"];
          $this->category_id = $post["categories_id"];
          $this->author = $post["first_name"]." ".$post["last_name"];
          $this->author_id = $post["account_id"];
          $this->date_posted = $post["date_posted"];
        }
      }
    }

    //get
    public function displayPosts($account_id = NULL)
    {

      $sql = "SELECT post_id, post_title, date_posted, categories_name FROM posts INNER JOIN categories ON posts.category_id = categories.categories_id";

      if($account_id != NULL)
      {
        $sql = $sql."WHERE account_id = " .$account_id;
      }

      $result = $this->conn->query($sql);

      if($result && $result->num_rows > 0)
      {
        while($row = $result->fetch_assoc())
        {
          echo "<tr>
                    <td>".$row["post_id"]."</td>
                    <td>".$row["post_title"]."</td>
                    <td>".$row["categories_name"]."</td>
                    <td>".$row["date_posted"]."</td>
                    <td>
                        <a href='post-details.php?id=".$row["post_id"]."' class='btn btn-sm btn-block btn-outline-dark'>
                          <i class='fas fa-angle-double-right'></i> Details 
                        </a>
                    </td>
                </tr>";
        } 
      }
      else
      {
        echo "<tr><td colspan='7' class='text-center'>No records to display</td></tr>";
      }
    }
  
    
    public function getPostID()
    {
      return $this->post_id;
    }
    public function getPostTitle()
    {
      return $this->post_title;
    }
    public function getPostMessage()
    {
        return $this->post_message;
    }
    public function getCategoryName()
    {
      return $this->category_name;
    }
    public function getCategoryID()
    {
      return $this->category_id;
    }
    public function getAuthor()
    {
      return $this->author;
    }
    public function getAuthorID()
    {
      return $this->author_id;
    }
    public function getDatePosted()
    {
      return $this->date_posted;
    }
    public function addPost($title, $date, $category, $message, $author)
    { 
        $sql = "INSERT INTO posts(post_title,date_posted,category_id,post_message,account_id) VALUES ('$title','$date',$category,'$message',$author)";

        if($this->conn->query($sql))
        {
          $_SESSION["success"] = 1 ;
          $_SESSION["message"] = "You have successfully added a post.";
          header("Location:../posts.php");
        }
        else
        {
          $_SESSION["success"] = 0 ;
          $_SESSION["message"] = "Failed to added a post. Kindly try again.";
          header("Location:../add-post.php");
        }
    }
    public function updatePost($id, $title, $date_posted, $category, $message, $author)
    {
        $sql = "UPDATE posts SET post_title='$title', date_posted='$date_posted', category_id = $category, post_message = '$message', account_id = $author WHERE post_id = $id";

        if($this->conn->query($sql))
        {
            $_SESSION["success"] = 1;
            $_SESSION["message"] = "You have successfully updateed your post.";
            header("Location:../posts.php");
        }
        else
        {
          $_SESSION["success"] = 0;
          $_SESSION["message"] = "Updateed failed. Kindly try again.";
          header("Location:../update-post.php?id=$id");
      }
     }
    }
?>