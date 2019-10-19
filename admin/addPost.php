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
                <li class="breadcrumb-item">
                    <a href="allPost.php">All Post</a>
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
                    <form action="sReq/addPost.php" method="post" enctype="multipart/form-data" id="createPost">
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
                            <input type="text" name="post_author" class="form-control" id="postAuthor" placeholder="Post Author">
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
        <!-- /.container-fluid -->
        <?php include "inc/footer.php"; ?>
        <html>

        <body>
            <script src="vendor/select2/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#post_tags').select2();
                });
            </script>
        </body>

        </html>