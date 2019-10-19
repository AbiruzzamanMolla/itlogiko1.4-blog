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
                        <li class="breadcrumb-item active">All Users</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <div class="btn-group float-right mt-2" role="group">
                        <a class="btn btn-success btn-md disabled" href="addCategory.php">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add User</a>
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
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Bio</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Bio</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `tbl_user`";
                                $result = $db->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['uid']; ?></th>
                                        <td><a href="http://ilkoblog.test/userprofile.php?uid=<?php echo $row['uid']; ?>"><?php echo $row['username']; ?></a></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['bio']; ?></td>
                                        <td><?php echo admRolConv($row['role']); ?></td>
                                        <td><a href="editUser.php?id=<?php echo $row['uid']; ?>"><i class="fas fa-edit d-inline"></i></a> || <a href="?delID=<?php echo $row['uid']; ?>" onclick="return confirm('Are you sure?');"><i class="far fa-trash-alt"></i></a></td>
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
            $sql = "DELETE FROM `tbl_user` WHERE `uid` = $id";
            $result = $db->query($sql);
            header("Location: allUser.php");
        }
        ?>