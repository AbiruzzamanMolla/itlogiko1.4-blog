<div class="col-md-4">
    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled mb-0">
                        <?php
                        $sql = "SELECT * FROM `tbl_category`";
                        $result = $db->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <li>
                                <a href="postByCat.php?catId=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a>
                            </li>
                            <hr>
                        <?php }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>