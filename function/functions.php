<?php
require_once "../db/conn.php";
function createPost($post, $post_image){
    $object = (object) $post;
print_r($object);
echo $post_image;   
}
?>