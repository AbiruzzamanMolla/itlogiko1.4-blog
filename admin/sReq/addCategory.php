<?php
include_once('../db/conn.php');
    if (isset($_POST['createCategory'])) {
        $cat_name = $_POST['cat_name'];
        $cat_description = $_POST['cat_description'];
        $cat_status = $_POST['cat_status'];
        if($cat_status == null){
            $cat_status = 0;
        }
        
        $query = "INSERT INTO `tbl_category`(`cat_name`, `cat_description`,`cat_status`) ";
        $query .= "VALUES('{$cat_name}','{$cat_description}',{$cat_status}) ";
        $create_category_query = $db->query($query);
        if($create_category_query){
            header("Location: ../allCategory.php");
        } else {
        echo mysqli_error($db);
    }
    } else {
        header("Location: ../allCategory.php");
    }
