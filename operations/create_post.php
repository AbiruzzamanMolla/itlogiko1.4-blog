<?php
include_once('../db/conn.php');
    if (isset($_POST['createPost'])) {
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        move_uploaded_file($post_image_temp, "../images/$post_image");
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('D, F d, Y - h:i:s A');
        $post_comment_count = 0;
        $query = "INSERT INTO `tbl_posts`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) ";
        $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}','{$post_date}','{$post_image}','{$post_content}','{$post_tags}',{$post_comment_count},'{$post_status}') ";
        $create_post_query = $db->query($query);
        if($create_post_query){
            header("Location: index.php");
        } else {
        echo mysqli_error($db);
    }
    } else {
        header("Location: index.php");
    }
?>