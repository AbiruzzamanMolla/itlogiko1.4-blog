<?php ob_start(); include "inc/header.php"; ?>
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
                        <li class="breadcrumb-item active">Add Category</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <div class="btn-group float-right mt-2" role="group">
                        <a class="btn btn-success btn-md disabled" href="addCategory.php">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Category
                        </a>
                    </div>
                </div>
            </div>
            <!-- Page Content -->
            <!-- DataTables Example -->
            <div class="card">
                <div class="card-header text-center">
                    Edit Category
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM `tbl_category` WHERE `cat_id` = $id";
                        $result = $db->query($sql) or die($db->error);;
                        $row = $result->fetch_assoc();
                        ?>
                    <form action="sReq/editCategory.php" method="post" id="editCat">
                        <div class="form-group">
                            <label for="catTitle">Category Title</label>
                            <input type="text" name="cat_name" class="form-control"
                                value="<?php echo $row['cat_name']; ?>" id="catTitle" placeholder="Category Name">
                        </div>

                        <div class="form-group">
                            <label for="catContent">Description</label>
                            <textarea class="form-control" name="cat_description" id="catContent"
                                rows="3"><?php echo $row['cat_description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <b>Status: </b>
                            <select name="cat_status" class="form-control">
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button type="submit" name="editCategory"
                                    class="btn btn-success btn-block btn-lg text-center p-3 m-2">Save Edit</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="reset"
                                    class="btn btn-secondary btn-block btn-lg text-center p-3 m-2">Reset</button>
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