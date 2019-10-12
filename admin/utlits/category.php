<?php include "includes/header.php"; ?>
<?php include "db/conn.php"; ?>
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
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
                        <td><?php echo $row['cat_status']; ?></td>
                        <td><a href="editCat.php?id=<?php echo $row['cat_id']; ?>"><i class="fa fa-facebook"></i> Edit</a> || <a href="?deleteid=<?php echo $row['cat_id']; ?>" onclick="return confirm('Are you sure?');"><i class="fa fa-facebook"></i> Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "includes/footer.php"; ?>
<?php
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `tbl_category` WHERE `cat_id` = $id";
    $result = $db->query($sql);
    header("Location: category.php");
}
?>