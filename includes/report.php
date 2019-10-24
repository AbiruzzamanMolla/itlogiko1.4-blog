<?php
include "../db/conn.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['report']) == "report"){
        extract($_POST);
        $update_value = $cr_count+1;
        $query = "UPDATE `tbl_posts` SET `post_comment_count` = '$update_value' WHERE `tbl_posts`.`post_id` = $id";
        $result = $db->query($query);
        if($result){
            header("Location: ../post.php?id=$id");
        } else {
            header("Location: ../post.php?id=$id");
        }  
    }
}
?>