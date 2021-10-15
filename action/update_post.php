<?php
  include '../class/post.php';

  $post = new Post();

  if( isset($_POST["post"]))
  {
      //input
      $id = $_POST["post_id"];
      $title = $_POST["title"];
      $date_posted = $_POST["date"];
      $category = $_POST["category"];
      $message = $_POST["message"];
      $author = $_POST["author"];

      $post->updatePost($id, $title, $date_posted, $category, $message, $author);
  }
?>