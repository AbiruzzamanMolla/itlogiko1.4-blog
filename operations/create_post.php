<?php
include_once('../function/functions.php');
if(isset($_POST['submit'])){
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $move = move_uploaded_file($post_image_temp, "../images/$post_image");
    if($move){
        createPost($_POST);
    } else {
        echo "Failed!";
    }
}
?>