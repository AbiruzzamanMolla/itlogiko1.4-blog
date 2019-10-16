<?php
include "../func/function.php";
session_start();
if(isset($_POST)){
    $cat_id = $_POST['cat_id'];
    $status = $_POST['status'];
    statusCngr($cat_id, $status);
}
?>