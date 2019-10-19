<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="vendor/select2/css/select2.min.css">
<div id="wrapper">

    <!-- Sidebar -->
    <?php include "inc/sidebar.php"; ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Add Post</li>
            </ol>

            <!-- Page Content -->
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
                    <?php
                    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM `tbl_posts` WHERE `post_id` = $id";
                        $result = $db->query($sql) or die($db->error);;
                        $row = $result->fetch_assoc();
                        ?>
                        <form action="sReq/editPost.php" method="post" enctype="multipart/form-data" id="editPost">
                            <div class="form-group">
                                <label for="postTitle">Post Title</label>
                                <input type="text" name="post_title" value="<?php echo $row['post_title']; ?>" class="form-control" id="postTitle" placeholder="Post Title">
                                <input type="hidden" name="id" value="<?php echo $row['post_id']; ?>">
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
                                            <?php stscngr($row['post_status']) ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="postAuthor">Author</label>
                                <input type="text" name="post_author" value="<?php echo $row['post_author']; ?>" class="form-control" id="postAuthor">
                            </div>
                            <div class="form-group">
                                <label for="postContent">Content</label>
                                <textarea class="form-control" name="post_content" id="postContent" rows="3"><?php echo $row['post_content']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="post_tags">Select Tags</label>
                                <select class="form-control" name="post_tags[]" id="post_tags" multiple="multiple" required>
                                    <?php showTags(); ?>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" name="editPost" class="btn btn-success btn-block btn-lg text-center p-3 m-2 m-auto">Update Post</button>
                                </div>
                        </form>
                    <?php } else {
                        header("Location: allPost.php");
                    } ?>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        <?php include "inc/footer.php"; ?>

        <html>

        <body>
            <?php
            $tag2 = [];
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT `post_tags` FROM `tbl_posts` WHERE `post_id` = $id";
                $result = $db->query($sql) or die($db->error);
                $row = $result->fetch_assoc();
                $tags = $row['post_tags'];
                $tags = explode(',', $tags);
                foreach ($tags as $tag) {
                    $tag2[] = '"' . str_replace(' ', '', $tag) . '"';
                }
                $tag2 = implode(',', $tag2);
            }
            ?>
            <script src="vendor/select2/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#post_tags').select2();
                    $('#post_tags').val([<?php print($tag2); ?>]);
                    $('#post_tags').trigger('change');
                });
            </script>
        </body>

        </html>