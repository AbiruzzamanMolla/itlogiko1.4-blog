<?php   
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
?>