<?php
include "db/conn.php";
// show category in create post page
function showCat(){
    global $db;
    $sql = "SELECT `cat_id`,`cat_name` FROM `tbl_category`";
    $result = $db->query($sql);
    while($row = $result->fetch_assoc()){
        echo "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
    }
}

?>