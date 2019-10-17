<?php ob_start();
include "inc/header.php"; ?>
<div id="wrapper">
    <!-- Sidebar -->
    <?php include "inc/sidebar.php"; ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <div class="row breadcrumb dashboard-breadcrumb">
                <div class="col-md-8">
                    <ol class="breadcrumb">
                        <!-- Breadcrumbs-->
                        <li class="breadcrumb-item">
                            <a href="index.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All Post</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <div class="btn-group float-right mt-2" role="group">
                        <a class="btn btn-success btn-md" href="addPost.php">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Post</a>
                    </div>
                </div>
            </div>
            <!-- Page Content -->
            <!-- DataTables Example -->
            <div class="card mb-3">
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `tbl_posts`";
                                $result = $db->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['post_id']; ?></th>
                                        <td><?php echo $row['post_title']; ?></td>
                                        <td><?php echo $row['post_author']; ?></td>
                                        <td><?php echo showCatNameById($row['post_category_id']); ?></td>
                                        <td><?php echo $row['post_date']; ?></td>
                                        <td><?php echo statusConvt($row['post_status']); ?></td>
                                        <td><img class="img-thumbnail" src="../images/<?php echo $row['post_image']; ?>" alt=""></td>
                                        <td><?php echo $a = substr($row['post_content'], 0, 100);
                                                echo (strlen($row['post_content']) > 100) ? "<a href=''>....</a>" : ""; ?></td>
                                        <td><a class="btn btn-outline-warning btn-sm m-1" href="editPost.php?id=<?php echo $row['post_id']; ?>"><i class="fas fa-edit d-inline"></i></a> <a class="btn btn-outline-danger btn-sm d-inline m-1" href="?delID=<?php echo $row['post_id']; ?>" onclick="return confirm('Are you sure?');"><i class="far fa-trash-alt"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <?php include "inc/footer.php"; ?>

        <?php if (isset($_GET['delID'])) {
            delPost($_GET['delID']);
        } ?>
