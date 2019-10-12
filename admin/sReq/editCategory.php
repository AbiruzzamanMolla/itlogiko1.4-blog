<?php
include_once('../db/conn.php');
if (isset($_POST['editCategory'])) {
    $id = $_POST['id'];
    $cat_name = $_POST['cat_name'];
    $cat_description = $_POST['cat_description'];
    $cat_status = $_POST['cat_status'];

    $query = "UPDATE `tbl_category` SET `cat_name` = '$cat_name', `cat_description` = '$cat_description', `cat_status` = '$cat_status' WHERE `tbl_category`.`cat_id` = $id";
    $create_category_query = $db->query($query);
    if ($create_category_query) {
        header("Location: ../allCategory.php");
    } else {
        echo mysqli_error($db);
    }
} else {
    header("Location: ../allCategory.php");
}
?>