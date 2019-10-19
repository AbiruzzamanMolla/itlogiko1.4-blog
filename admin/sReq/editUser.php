<?php
session_start();
include_once('../db/conn.php');
if (isset($_POST['editUser'])) {
    $id = $_POST['id'];
    if(!$id){
        header("Location: ../allUser.php");
    }
    $username = $_POST['username'];
    $fullName = $_POST['fullName'];
    $title = $_POST['title'];
    $email = $_POST['email'];
    $bio =  $_POST['bio'];
    $bio = $db->real_escape_string($bio);
    $role = $_POST['role'];

    if (empty($username) && empty($fullName) && empty($title) && empty($email) && empty($bio) && empty($role)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please fill all fields!! ";
        header("Location: ../editUser.php?id=$id");
    } elseif (empty($username)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please add username!! ";
        header("Location: ../editUser.php?id=$id");
    } elseif (empty($email)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please add email!! ";
        header("Location: ../editUser.php?id=$id");
    } else {
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
        $_SESSION['errMsgClass'] = "alert alert-success alert-dismissible";
        $_SESSION['errMsg'] = "User deatils edited Successfully!!";
        header("Location: ../allUser.php");
    } else {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "User deatils failed!!";
        header("Location: ../allUser.php");
    }

    }
}