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
                        <li class="breadcrumb-item active">Add Category</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <div class="btn-group float-right mt-2" role="group">
                        <a class="btn btn-success btn-md disabled" href="addCategory.php">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Category</a>
                    </div>
                </div>
            </div>
            <!-- Page Content -->
            <!-- DataTables Example -->
            <div class="card">
                <div class="card-header text-center">
                    Create Category
                </div>
                <div class="card-body">
                    <form action="operations/create_category.php" method="post" id="createPost">
                        <div class="form-group">
                            <label for="catTitle">Category Title</label>
                            <input type="text" name="cat_name" class="form-control" id="catTitle" placeholder="Category Name">
                        </div>

                        <div class="form-group">
                            <label for="catContent">Description</label>
                            <textarea class="form-control" name="cat_description" id="catContent" rows="3"></textarea>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline p-2 m-3">
                            <input type="radio" id="catStatus" value="1" name="cat_status" class="custom-control-input">
                            <label class="custom-control-label" for="catStatus">Publish Post</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 m-auto">
                                <button type="submit" name="createCategory" class="btn btn-success btn-block btn-lg text-center p-3 m-2">Create Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <?php include "inc/footer.php"; ?>