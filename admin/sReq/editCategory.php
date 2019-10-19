<?php
session_start();
include_once('../db/conn.php');
include_once('../func/function.php');
if (isset($_POST['editCategory'])) {
    $id = $_POST['id'];
    $cat_name = $_POST['cat_name'];
    $cat_description = $_POST['cat_description'];
    $cat_status = $_POST['cat_status'];

    if (empty($cat_description) && empty($cat_name)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please add Category name and Discription!! ";
        header("Location: ../editCategory.php?id=$id");
    } elseif (empty($cat_name)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please add Category name!! ";
        header("Location: ../editCategory.php?id=$id");
    } elseif (empty($cat_description)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please add Category Description!! ";
        header("Location: ../editCategory.php?id=$id");
    } else {
        editCategory($id, $cat_name, $cat_description, $cat_status);
    }
}
?>