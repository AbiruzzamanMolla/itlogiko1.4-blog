<?php
include_once('../db/conn.php');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `tbl_user` WHERE `email` = '$email' AND `password` = '$password'";
    $result = $db->query($query);
    $num_row = $result->num_rows;
    if ($num_row === 1) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION["id"] = $row['uid'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        if(isset($_SESSION['backlink']) == 'add_user_post.php'){
            header('Location: ../../add_user_post.php');
        } else {
            header("Location: ../index.php");
        }
    } else {
        header("Location: ../login.php?msg=Problem Login!");
    }
} else {
    header("Location: ../login.php");
}
