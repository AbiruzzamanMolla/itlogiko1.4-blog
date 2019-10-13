<?php
// show category name in all post
function showCatNameById($id){
    global $db;
    $sql = "SELECT `cat_name` FROM `tbl_category` WHERE `cat_id` = $id";
    $result = $db->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            return $row['cat_name'];
        }
    }  else {
            return "Not Found!";
        }
}
// show categories in add post
function showCat(){
    global $db;
    $sql = "SELECT `cat_id`,`cat_name` FROM `tbl_category`";
    $result = $db->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
    }
}
// logout function
function logout(){
    if (isset($_GET['logout']) && $_SESSION['id']) {
        session_destroy();
        header("Location: login.php");
    }
}
?>