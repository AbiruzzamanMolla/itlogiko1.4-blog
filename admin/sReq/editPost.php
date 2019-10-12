<?php
include_once('../db/conn.php');
if (isset($_POST['editPost'])) {
    $id = $_POST['id'];
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    // $post_image = $_FILES['post_image']['name'];
    // $post_image_temp = $_FILES['post_image']['tmp_name'];
    // move_uploaded_file($post_image_temp, "../images/$post_image");
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('D, F d, Y - h:i:s A');

    $query = "UPDATE `tbl_posts` SET `post_category_id` = '{$post_category_id}', `post_title` = '{$post_title}', `post_author` = '{$post_author}', `post_date` = '{$post_date}', `post_content` = '{$post_content}', `post_tags` = '{$post_tags}', `post_status` = '{$post_status}' WHERE `tbl_posts`.`post_id` = $id";
    $edit_post_query = $db->query($query);
    if ($edit_post_query) {
        header("Location: ../allPost.php");
    } else {
        echo mysqli_error($db);
    }
} else {
    header("Location: ../allPost.php");
}
