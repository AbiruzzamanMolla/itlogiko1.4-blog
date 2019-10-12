<?php include "inc/header.php"; ?>
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
                            <div class="form-group">
                                <label for="post_category">Select Category</label>
                                <select class="form-control" name="post_category_id" id="post_category">
                                    <option value="<?php echo $row['post_category_id']; ?>"><?php echo showCatNameById($row['post_category_id']); ?></option>
                                    <?php showCat(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="postAuthor">Author</label>
                                <input type="text" name="post_author" value="<?php echo $row['post_author']; ?>" class="form-control" id="postAuthor">
                            </div>
                            <!-- <p id="preview">Select Preview</p>
                            <div class="custom-file p-4">
                                <input type="file" class="custom-file-input" name="post_image" id="postImage">
                                <label class="custom-file-label" for="postImage">Choose image</label>
                            </div> -->
                            <div class="form-group">
                                <label for="postContent">Content</label>
                                <textarea class="form-control" name="post_content" id="postContent" rows="3"><?php echo $row['post_content']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="postTags">Tags</label>
                                <input type="text" name="post_tags" class="form-control" style="width: 80%; padding: 15px 22px; margin: 10px 5px; box-sizing: border-box;" id="postTags" value="<?php echo $row['post_tags']; ?>" data-role="tagsinput">
                            </div>
                            <div class="custom-control custom-radio custom-control-inline p-2 m-3">
                                <input type="radio" id="postStatus" value="1" name="post_status" class="custom-control-input">
                                <label class="custom-control-label" for="postStatus">Publish Post</label>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <button type="submit" name="editPost" class="btn btn-success btn-block btn-lg text-center p-3 m-2">Update Post</button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="reset" class="btn btn-secondary btn-block btn-lg text-center p-3 m-2">Reset</button>
                                </div>
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