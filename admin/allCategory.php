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
                        <li class="breadcrumb-item active">All Category</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <div class="btn-group float-right mt-2" role="group">
                        <a class="btn btn-success btn-md" href="addCategory.php">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Category</a>
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
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Total Post</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Total Post</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `tbl_category`";
                                $result = $db->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['cat_id']; ?></th>
                                        <td><?php echo $row['cat_name']; ?></td>
                                        <td><?php echo $row['cat_description']; ?></td>
                                        <td><?php echo totalPostOnCat($row['cat_id']) ?></td>
                                        <td><?php echo statusConvt($row['cat_status']); ?><form class="ml-2 d-inline" action="sReq/catStsCng.php" method="post"><input type="hidden" name="cat_id" value="<?php echo $row['cat_id']; ?>"><button type="submit" name="status" value="<?php echo $row['cat_status']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-sync d-inline"></i></button></form>
                                        </td>
                                        <td><a href="editCategory.php?id=<?php echo $row['cat_id']; ?>">Edit</a> || <a href="?delID=<?php echo $row['cat_id']; ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
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

        <?php
        if (isset($_GET['delID'])) {
            $id = $_GET['delID'];
            $sql = "DELETE FROM `tbl_category` WHERE `cat_id` = $id";
            $result = $db->query($sql);
            header("Location: allCategory.php");
        }
        ?>