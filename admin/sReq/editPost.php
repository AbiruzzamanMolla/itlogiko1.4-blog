<?php
include_once('../db/conn.php');
session_start();
include_once('../func/function.php');
if (isset($_POST['editPost'])) {
    $id = $_POST['id'];
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_tags = $_POST['post_tags'];
    $post_tags = implode(', ', $post_tags);
    $post_content = $_POST['post_content'];
    $post_date = date('D, F d, Y - h:i:s A');
    if (empty($post_title) && empty($post_author) && empty($post_content)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please fill all fields!! ";
        header("Location: ../editPost.php?id=$id");
    } elseif (empty($post_title)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please add post title!! ";
        header("Location: ../editPost.php?id=$id");
    } elseif (empty($post_author)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please add post author name!! ";
        header("Location: ../editPost.php?id=$id");
    } elseif (empty($post_category_id) || $post_category_id == 'null') {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please select category!! ";
        header("Location: ../editPost.php?id=$id");
    } elseif ($post_status == 'null') {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please select post status!! ";
        header("Location: ../editPost.php?id=$id");
    } elseif (empty($post_tags)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please select post tags!! ";
        header("Location: ../editPost.php?id=$id");
    } elseif (empty($post_content)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible bg-red m-auto";
        $_SESSION['errMsg'] = "Please write post content!! ";
        header("Location: ../editPost.php?id=$id");
    }  else {
            editPost($post_category_id, $post_title, $post_author, $post_date, $post_content, $post_tags, $post_status, $id);
        } 
    } else {
            $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible bg-red m-auto";
            $_SESSION['errMsg'] = "unknown error!! ";
            header("Location: ../editPost.php?id=$id");
    }
    ?>
