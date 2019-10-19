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
                        <li class="breadcrumb-item active">All Comments</li>
                    </ol>
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
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Report</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#ID</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Report</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `tbl_comment`";
                                $result = $db->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['comment_id']; ?></th>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['comment_body']; ?></td>
                                        <td><?php echo $row['report']; ?></td>
                                        <td><?php echo statusConvt($row['status']); ?></td>
                                        <td>
                                            <form class="ml-2 d-inline d-inline-block" action="sReq/cmtStsCngr.php" method="post"><input type="hidden" name="cmt_id" value="<?php echo $row['comment_id']; ?>"><button type="submit" name="status" value="<?php echo $row['status']; ?>" class=""><i class="fa fa-sync d-inline"></i></button></form>
                                            <a href="?delID=<?php echo $row['comment_id']; ?>" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a>
                                        </td>
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
            $sql = "DELETE FROM `tbl_comment` WHERE `comment_id` = $id";
            $result = $db->query($sql);
            if ($result) {
                $_SESSION['errMsgClass'] = "alert alert-success alert-dismissible";
                $_SESSION['errMsg'] = "Comment deleted succesfully!";
                header("Location: allComment.php");
            } else {
                $_SESSION['errMsgClass'] = "alert alert-warning alert-dismissible";
                $_SESSION['errMsg'] = "Comment delation failed!";
                header("Location: allComment.php");
            }
        }
        ?>