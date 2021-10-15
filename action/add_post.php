<?php
  include '../class/post.php';

  if( isset($_POST["post"]) )
  {
    $title = $_POST["title"];
    $date = $_POST["date"]; 
    $category = $_POST["category"];
    $message = $_POST["message"];
    $author = $_POST["author"];

    $post = new Post();
    $post->addPost($title, $date, $category, $message, $author);

  }
?>