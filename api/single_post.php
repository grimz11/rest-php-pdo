<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/Post.php';

$database = new Database();
$db = $database->connect();

$post = new Post($db);

//get ID from url
$post->id = isset($_GET['id']) ? $_GET['id'] : die();

$post->getSinglePost();

$post_arr = array(
  'id' => $post->id,
  'title' => $post->title,
  'body' => $post->body,
  'author' => $post->author,
  'category_id' => $post->category_id,
  'category_name' => $post->category_name
);

print_r(json_encode($post_arr));