<?php
/*/ 
-> Name: function.php
-> Folder: /admin
-> Description: 
-> Function Page for admin panel of Blog
*/

// #########Category related Functions#################


// including database connection
include "../db/conn.php";

/*/  Function for add category and show category*/

// adding category function
function addCat($cat_name, $cat_description, $cat_status){
    global $db;
    $query = "INSERT INTO `tbl_category`(`cat_name`, `cat_description`,`cat_status`) ";
    $query .= "VALUES('{$cat_name}','{$cat_description}',{$cat_status}) ";
    $create_category_query = $db->query($query);
    if ($create_category_query) {
        $_SESSION['errMsgClass'] = "alert alert-success alert-dismissible";
        $_SESSION['errMsg'] = "Category added succesfully!";
        header("Location: ../allCategory.php");
    } else {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Something went wrong!! " . mysqli_error($db);
        header("Location: ../addCategory.php");
    }
}


// count total posts in a category
function totalPostOnCat($cat_id){
    global $db;
    $query = "SELECT * FROM `tbl_posts` WHERE `post_category_id` = $cat_id";
    return $result = $db->query($query)->num_rows;
}

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

// status converter
function statusConvt($status){
    if($status == '1'){
        return "Published";
    } else {
        return "Draft";
    }
}
// status changer by swap 
function statusCngr($cat_id, $status){
    global $db;
    $status = $status == '1' ? '0' : '1';
    $query = "UPDATE `tbl_category` SET `cat_status` = $status WHERE `tbl_category`.`cat_id` = $cat_id";
    $result = $db->query($query);
    if($result){
        $_SESSION['errMsgClass'] = "alert alert-success alert-dismissible";
        $_SESSION['errMsg'] = "Category status changed succesfully!";
        header("Location: ../allCategory.php");
    } else {
        $_SESSION['errMsgClass'] = "alert alert-warning alert-dismissible";
        $_SESSION['errMsg'] = "Category status change failed!";
        header("Location: ../allCategory.php");
    }

}

/*/  Function for edit category*/

// status changer
function stscngr($status){
    if ($status == '1') {
        echo '<option value="1" selected>Published</option>';
        echo '<option value="0">Draft</option>';
    } else {
        echo '<option value="1">Published</option>';
        echo '<option value="0" selected>Draft</option>';
    }
}

// edit category
function editCategory($id, $cat_name, $cat_description, $cat_status){
    global $db;
    $query = "UPDATE `tbl_category` SET `cat_name` = '$cat_name', `cat_description` = '$cat_description', `cat_status` = '$cat_status' WHERE `tbl_category`.`cat_id` = $id";
    $result = $db->query($query);
    if ($result) {
        $_SESSION['errMsgClass'] = "alert alert-success alert-dismissible";
        $_SESSION['errMsg'] = "Category changed succesfully!";
        header("Location: ../allCategory.php");
    } else {
        $_SESSION['errMsgClass'] = "alert alert-warning alert-dismissible";
        $_SESSION['errMsg'] = "Category change failed!";
        header("Location: ../allCategory.php");
    }
}

// delete category

function delCat($id){
    global $db;
    $sql = "DELETE FROM `tbl_category` WHERE `cat_id` = $id";
    $result = $db->query($sql);
    if($result){
        $_SESSION['errMsgClass'] = "alert alert-warning alert-dismissible";
        $_SESSION['errMsg'] = "Category Deleted Successfully!!";
        header("Location: allCategory.php");
    } else {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Category Deleted failed!!";
        header("Location: allCategory.php");
    }
}


/*/  Function for post */
// add post 

function addPost($post_category_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_tags, $post_comment_count, $post_status){
    global $db;
    $query = "INSERT INTO `tbl_posts`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) ";
    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}','{$post_date}','{$post_image}','{$post_content}','{$post_tags}',{$post_comment_count},'{$post_status}') ";
    $result = $db->query($query);
    if ($result) {
        $_SESSION['errMsgClass'] = "alert alert-success alert-dismissible";
        $_SESSION['errMsg'] = "Post added Successfully!!";
        header("Location: allPost.php");
    } else {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Post adding failed!!";
        header("Location: allPost.php");
    }
}

// edit post

function editPost($post_category_id, $post_title, $post_author, $post_date, $post_content, $post_tags, $post_status, $id){
    global $db;
    $query = "UPDATE `tbl_posts` SET `post_category_id` = '{$post_category_id}', `post_title` = '{$post_title}', `post_author` = '{$post_author}', `post_date` = '{$post_date}', `post_content` = '{$post_content}', `post_tags` = '{$post_tags}', `post_status` = $post_status WHERE `tbl_posts`.`post_id` = $id";
    $result = $db->query($query);
    if ($result) {
        $_SESSION['errMsgClass'] = "alert alert-success alert-dismissible";
        $_SESSION['errMsg'] = "Post edited Successfully!!";
        header("Location: ../allPost.php");
    } else {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Post editing failed!!";
        header("Location: ../allPost.php");
    }
}

// delete post
function delPost($id){
    global $db;
    $sql = "DELETE FROM `tbl_posts` WHERE `post_id` = $id";
    $result = $db->query($sql);
    if ($result) {
        $_SESSION['errMsgClass'] = "alert alert-warning alert-dismissible";
        $_SESSION['errMsg'] = "Post Deleted Successfully!!";
        header("Location: allPost.php");
    } else {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Post Deleted failed!!";
        header("Location: allPost.php");
    }
}



/*  user comment controll functions */

// change comment status

function cmtStsCngr($cmt_id, $status){
    global $db;
    $status = $status == '1' ? '0' : '1';
    $query = "UPDATE `tbl_comment` SET `status` = $status WHERE `comment_id` = $cmt_id";
    $result = $db->query($query);
    if ($result) {
        $_SESSION['errMsgClass'] = "alert alert-success alert-dismissible";
        $_SESSION['errMsg'] = "Comment status changed succesfully!";
        header("Location: ../allComment.php");
    } else {
        $_SESSION['errMsgClass'] = "alert alert-warning alert-dismissible";
        $_SESSION['errMsg'] = "Comment status change failed!";
        header("Location: ../allComment.php");
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
// show categories in add post
function showUsers(){
    global $db;
    $sql = "SELECT `uid`, `username` FROM `tbl_user`";
    $result = $db->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['username']}'>{$row['username']}</option>";
    }
}
// show categories in add post
function showDate(){
    global $db;
    $sql = "SELECT `cat_id`,`cat_name` FROM `tbl_category`";
    $result = $db->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
    }
}
// show tags

function showTags(){
    global $db;
    $sql = "SELECT `tags` FROM `tbl_tags`";
    $result = $db->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['tags']}'>{$row['tags']}</option>";
    }
}
// logout function
function logout(){
    if (isset($_GET['logout']) && $_SESSION['id']) {
        session_destroy();
        header("Location: login.php");
    }
}

function adminCheck(){
    if(isset($_SESSION) && $_SESSION['role'] !== '1'){
        header("Location: ../index.php");
    }
}
// admin role convarter
function admRolConv($role){
    if ($role == '1') {
        return "Admin";
    } else {
        return "User";
    }
}

// function for cat name get.
?>