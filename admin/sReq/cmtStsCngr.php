<?php
include "../func/function.php";
session_start();
if(isset($_POST)){
    $cmt_id = $_POST['cmt_id'];
    $status = $_POST['status'];
    cmtStsCngr($cmt_id, $status);
}
