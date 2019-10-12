<?php include_once "includes/header.php";
include "function/functions.php"; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

<div class="container pb-2">
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
                    <div class="col-sm-6">
                        <button type="submit" name="createCategory" class="btn btn-success btn-block btn-lg text-center p-3 m-2">Create Category</button>
                    </div>
                    <div class="col-sm-6">
                        <button type="reset" class="btn btn-secondary btn-block btn-lg text-center p-3 m-2">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once "includes/footer.php"; ?>