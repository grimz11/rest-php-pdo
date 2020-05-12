<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/Post.php';

$database = new Database();
$db = $database->connect();

$post = new Post($db);

$result = $post->getPost();

$count = $result->rowCount();

if($count > 0) {
  $posts_arr = array();
  $posts_arr['data'] = array();

  while($row = $result->fetch(PDO::FETCH_ASSOC)){
    extract($row);

    $post_item = array(
      'id' => $id,
      'title' => $title,
      'body' => html_entity_decode($body),
      'author' => $author,
      'category_id' => $category_id,
      'category_name' => $category_name
    );

    //push to data
    array_push($posts_arr['data'], $post_item);
  }
  echo json_encode($posts_arr);
}else {
  echo json_encode(
    array('message' => 'No posts found')
  );
}