<?php
include_once('../db/conn.php');
session_start();
include_once('../func/function.php');
    if (isset($_POST['createPost'])) {
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_tags = implode(', ', $post_tags);
        $post_content = $_POST['post_content'];
        $post_date = date('D, F d, Y - h:i:s A');
        $post_comment_count = 0;

    if (empty($post_title) && empty($post_author) && empty($post_image) && empty($post_content)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please fill all fields!! ";
        header("Location: ../addPost.php");
    } elseif (empty($post_title)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please add post title!! ";
        header("Location: ../addPost.php");
    } elseif (empty($post_author)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please add post author name!! ";
        header("Location: ../addPost.php");
    } elseif(empty($post_category_id) || $post_category_id == 'null'){
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please select category!! ";
        header("Location: ../addPost.php");
    } elseif(empty($post_status) || $post_status == 'null'){
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please select post status!! ";
        header("Location: ../addPost.php");
    } elseif(empty($post_tags)){
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please select post tags!! ";
        header("Location: ../addPost.php");
    } elseif(empty($post_content)){
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible bg-red m-auto";
        $_SESSION['errMsg'] = "Please write post content!! ";
        header("Location: ../addPost.php"); 
    } elseif(empty($post_image)){
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible bg-red m-auto";
        $_SESSION['errMsg'] = "Please select a image preview!! ";
        header("Location: ../addPost.php"); 
    } else {
        $img_up = move_uploaded_file($post_image_temp, "../images/$post_image");
        if ($img_up) {
            addPost($post_category_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_tags, $post_comment_count, $post_status);
            $_SESSION['errMsgClass'] = "alert alert-success alert-dismissible bg-green m-auto";
            $_SESSION['errMsg'] = "Post added successfully!! ";
            header("Location: ../allPost.php"); 
        } else {
            $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible bg-red m-auto";
            $_SESSION['errMsg'] = "unknown error!! ";
            header("Location: ../addPost.php"); 
        }
    }
    }

?>