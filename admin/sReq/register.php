<?php
include_once('../db/conn.php');
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['pwd1'];
    $password2 = $_POST['pwd2'];
    if($password1 == $password2){
        $password = $password1;
    }
    $bio = "";
    $query = "INSERT INTO `tbl_user`(`username`, `email`,`password`, `bio`) ";
    $query .= "VALUES('{$username}','{$email}','{$password}', '{$bio}') ";
    $result = $db->query($query);
    if ($result) {
        session_start();
        $_SESSION["id"] = $last_id =  $db->insert_id;
        $query = "SELECT `username` FROM `tbl_user` WHERE `uid` = {$last_id}";
        $result = $db->query($query)->fetch_assoc();
        $_SESSION['username'] = $result['username'];
        header("Location: ../index.php");
    } else {
        echo mysqli_error($db);
    }
} else {
    header("Location: ../register.php");
}
