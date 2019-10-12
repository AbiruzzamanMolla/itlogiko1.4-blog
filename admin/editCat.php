<?php include_once "includes/header.php";
include "function/functions.php"; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

<div class="container pb-2">
    <div class="card">
        <div class="card-header text-center">
            Edit Category
        </div>
        <div class="card-body">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM `tbl_category` WHERE `cat_id` = $id";
                $result = $db->query($sql) or die($db->error);;
                $row = $result->fetch_assoc();
                ?>
                <form action="operations/edit_category.php" method="post" id="editCat">
                    <div class="form-group">
                        <label for="catTitle">Category Title</label>
                        <input type="text" name="cat_name" class="form-control" value="<?php echo $row['cat_name']; ?>" id="catTitle" placeholder="Category Name">
                    </div>

                    <div class="form-group">
                        <label for="catContent">Description</label>
                        <textarea class="form-control" name="cat_description" id="catContent" rows="3"><?php echo $row['cat_description']; ?></textarea>
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
                            <button type="submit" name="editCategory" class="btn btn-success btn-block btn-lg text-center p-3 m-2">Save Edit</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="reset" class="btn btn-secondary btn-block btn-lg text-center p-3 m-2">Reset</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php include_once "includes/footer.php"; ?>