<?php include_once "includes/header.php";
ob_start(); ?>
<link rel="stylesheet" href="admin/vendor/select2/css/select2.min.css">
<?php include_once "function/functions.php"; ?>

<!-- Navigation -->
<?php include "includes/navbar.php"; ?>

<!-- Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header text-center">
                    Create Post
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['errMsg'])) { ?>
                        <div class="<?php echo $_SESSION['errMsgClass'] ?>" id="showMsg">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong><?php echo $_SESSION['errMsg'] ?></strong></div>
                    <?php
                        unset($_SESSION["errMsgClass"]);
                        unset($_SESSION["errMsg"]);
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data" id="createPost">
                        <div class="form-group">
                            <label for="postTitle">Post Title</label>
                            <input type="text" name="post_title" class="form-control" id="postTitle" placeholder="Post Title">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="post_category">Select Category</label>
                                    <select class="form-control" name="post_category_id" id="post_category">
                                        <option value="null">Select Category</option>
                                        <?php showCat(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postStatus">Post Status</label>
                                    <select class="form-control" name="post_status" id="postStatus">
                                        <option value="null">Select Status</option>
                                        <option value="1">Published</option>
                                        <option value="0">Draft</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postAuthor">Author</label>
                            <input type="text" name="" class="form-control" value="<?php echo $_SESSION['username']; ?>" id="postAuthor" disabled>
                            <input type="hidden" value="<?php echo $_SESSION['username']; ?>" name="post_author">
                        </div>
                        <p id="preview">Select Preview</p>
                        <div class="custom-file p-4">
                            <input type="file" class="custom-file-input" name="post_image" id="postImage">
                            <label class="custom-file-label" for="postImage">Choose image</label>
                        </div>
                        <div class="form-group">
                            <label for="postContent">Content</label>
                            <textarea class="form-control" name="post_content" id="postContent" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="post_tags">Select Tags</label>
                                <select class="form-control" name="post_tags[]" id="post_tags" multiple="multiple" required>
                                    <option>Select Tags</option>
                                    <?php showTags(); ?>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <button type="submit" name="createPost" class="btn btn-success btn-block btn-lg text-center p-3 m-2">Create Post</button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="reset" class="btn btn-secondary btn-block btn-lg text-center p-3 m-2">Reset</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container -->



<?php include_once "includes/footer.php"; ?>
<html>

<body>
    <script src="admin/vendor/select2/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#post_tags').select2();
        });
        $('#showMsg').delay(6000).fadeOut(300);
    </script>
</body>

</html>

<?php
if (isset($_POST['createPost'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_tags = implode(', ', $post_tags);
    $post_content = $_POST['post_content'];
    $post_date = date('D, F d, Y');
    $post_comment_count = 0;

    if (empty($post_title) && empty($post_author) && empty($post_image) && empty($post_content)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please fill all fields!! ";
        header("Location: add_user_post.php");
    } elseif (empty($post_title)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please add post title!! ";
        header("Location: add_user_post.php");
    } elseif (empty($post_author)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please add post author name!! ";
        header("Location: add_user_post.php");
    } elseif (empty($post_category_id) || $post_category_id == 'null') {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please select category!! ";
        header("Location: add_user_post.php");
    } elseif (empty($post_status) || $post_status == 'null') {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please select post status!! ";
        header("Location: add_user_post.php");
    } elseif (empty($post_tags)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
        $_SESSION['errMsg'] = "Please select post tags!! ";
        header("Location: add_user_post.php");
    } elseif (empty($post_content)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible bg-red m-auto";
        $_SESSION['errMsg'] = "Please write post content!! ";
        header("Location: add_user_post.php");
    } elseif (empty($post_image)) {
        $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible bg-red m-auto";
        $_SESSION['errMsg'] = "Please select a image preview!! ";
        header("Location: add_user_post.php");
    } else {
        $img_up = move_uploaded_file($post_image_temp, "admin/images/$post_image");
        if ($img_up) {
            $query = "INSERT INTO `tbl_posts`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) ";
            $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}','{$post_date}','{$post_image}','{$post_content}','{$post_tags}',{$post_comment_count},'{$post_status}') ";
            $result = $db->query($query);
            if ($result) {
                $_SESSION['errMsgClass'] = "alert alert-success alert-dismissible";
                $_SESSION['errMsg'] = "Post added Successfully!!";
                header("Location: index.php");
            } else {
                $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible";
                $_SESSION['errMsg'] = "Post adding failed!!";
                header("Location: add_user_post.php");
            }
        } else {
            $_SESSION['errMsgClass'] = "alert alert-danger alert-dismissible bg-red m-auto";
            $_SESSION['errMsg'] = "unknown error!! ";
            header("Location: add_user_post.php");
        }
    }
}
?>