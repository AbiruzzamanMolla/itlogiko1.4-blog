<?php include "inc/header.php"; ?>
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
                        <a class="btn btn-md btn-primary" href="#">
                            <i class="fa fa-flag" aria-hidden="true"></i> List Post</a>
                    </div>
                </div>
            </div>
            <!-- Page Content -->
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-body">
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
                                        <td><?php echo $row['post_status']; ?></td>
                                        <td><?php echo $row['post_image']; ?></td>
                                        <td><?php echo $a = substr($row['post_content'], 0, 100); ?>....</td>
                                        <td><a href="editPost.php?id=<?php echo $row['post_id']; ?>">Edit</a> || <a href="?delID=<?php echo $row['post_id']; ?>">Delete</a></td>
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