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
                        <li class="breadcrumb-item active">Edit User Profile</li>
                    </ol>
                </div>
            </div>
            <!-- Page Content -->
            <!-- DataTables Example -->
            <div class="card">
                <div class="card-header text-center">
                    Edit User Info
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM `tbl_user` WHERE `uid` = $id";
                        $result = $db->query($sql) or die($db->error);;
                        $row = $result->fetch_assoc();
                        ?>
                        <form action="sReq/editUser.php" method="post" id="editUser">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" id="username">
                            </div>

                            <div class="form-group">
                                <label for="fullName">Full Name:</label>
                                <input type="text" name="fullName" class="form-control" value="<?php echo $row['fullName']; ?>" id="fullName">
                            </div>
                            <div class="form-group">
                                <label for="title">Moto:</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" id="title">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea class="form-control" name="bio" id="bio" rows="10"><?php echo $row['bio']; ?></textarea>
                            </div>
                            <div class=" form-group">
                                <b>User role: </b>
                                <select name="role" class="form-control">
                                    <option value="1">User</option>
                                    <option value="0">Admin</option>
                                </select>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group row">
                                <div class="col-sm-6 m-auto">
                                    <button type="submit" name="editUser" class="btn btn-success btn-block btn-lg text-center p-3 m-2">Save Edit</button>
                                </div>
                            </div>
                        </form>
                    <?php } else {
                        header("Location: allCategory.php");
                    } ?>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <?php include "inc/footer.php"; ?>