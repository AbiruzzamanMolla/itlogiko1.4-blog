<?php
include_once('../db/conn.php');
if (isset($_POST['editUser'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $fullName = $_POST['fullName'];
    $title = $_POST['title'];
    $email = $_POST['email'];
    $bio =  $_POST['bio'];
    $bio = $db->real_escape_string($bio);
    $role = $_POST['role'];

    $query = "UPDATE `tbl_user` SET 
    `username` = '$username',
    `fullName` = '$fullName', 
    `title` = '$title',
    `email` = '$email', 
    `bio` = '$bio', 
    `role` = '$role' 
    WHERE `tbl_user`.`uid` = $id";
    $query = $db->query($query);
    if ($query) {
        header("Location: ../allUser.php");
    } else {
        echo mysqli_error($db);
    }
}
