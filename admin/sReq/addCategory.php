<?php
session_start();
include_once('../func/function.php');
    if (isset($_POST['createCategory'])) {
        $cat_name = $_POST['cat_name'];
        $cat_description = $_POST['cat_description'];
        $cat_status = $_POST['cat_status'];
        if($cat_status == null){
            $cat_status = 0;
        }
        
        if (empty($cat_description) && empty($cat_name)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please add Category name and Discription!! ";
        header("Location: ../addCategory.php");
        }elseif(empty($cat_name)){
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please add Category name!! ";
        header("Location: ../addCategory.php");
        }
        elseif (empty($cat_description)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please add Category Description!! ";
        header("Location: ../addCategory.php");
        } else {
            addCat($cat_name, $cat_description, $cat_status);
        }

    } else {
        header("Location: ../addCategory.php");
    }
