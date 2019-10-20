<?php include_once "includes/header.php"; ?>
<?php include "db/conn.php"; ?>

<!-- Navigation -->
<?php include "includes/navbar.php"; ?>

<!-- Page Content -->
<div class="container-fluid">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-9 mt-4">
            <?php
            $per_page = 5;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = "";
            }
            if ($page == "" || $page == 1) {
                $page_1 = 0;
            } else {
                $page_1 = ($page * $per_page) - $per_page;
            }
            ?>
            <?php
            $post_query_count = "SELECT * FROM `tbl_posts` WHERE post_status = '1'";
            $find_count = $db->query($post_query_count);
            $count = $find_count->num_rows;
            if ($count < 1) {
                echo "<center><div class='alert alert-info'><strong>Sorry!</strong> No post abilable.....</div></center>";
            } else {
                $count = ceil($count / 5);
                $query = "SELECT * FROM `tbl_posts` WHERE post_status = '1' ORDER BY `post_id` DESC  LIMIT $page_1,$per_page";
                $select_all_posts_query = $db->query($query);
                while ($row = $select_all_posts_query->fetch_assoc()) {
                    ?>
                    <!-- Blog Post -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $row['post_title']; ?></h2>
                            <p class="card-text"><img class="img-fluid float-left img-thumbnail postImage" src="admin/images/<?php echo $row['post_image']; ?>" alt="Card image cap"><?php echo $row['post_content']; ?></p>
                            <a href="post.php?id=<?php echo $row['post_id']; ?>" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on <?php echo $row['post_date']; ?> by
                            <a><?php echo $row['post_author']; ?></a>
                        </div>
                    </div>
                    <hr>
            <?php }
            }
            ?>
            <!-- Pager -->
            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <?php
                if ($page == '') {
                    $page = 0;
                    $disabled = 'disabled';
                } elseif ($page == 1) {
                    $disabled = 'disabled';
                } else {
                    $disabled = '';
                }
                $i = '';
                echo "<li class='page-item " . $disabled . "'><a class='page-link' href='index.php?page=" . ($page - 1) . "' class='button'>Previous</a></li>";
                for ($i = 1; $i <= $count; $i++) {
                    if ($i == $page) {
                        echo "<li class='page-item active'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                    }
                }
                $getpage = isset($_GET['page']) ? $_GET['page'] : '';
                if ($getpage == $i - 1) {
                    $disable = 'disabled';
                } else {
                    $disable = '';
                }
                echo "<li class='page-item " . $disable . "'><a class='page-link' href='index.php?page=" . ($page + 1) . "' class='button'>NEXT</a></li>";
                ?>
            </ul>
        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-3">

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

        </div>


    </div>
    <!-- /.row -->

</div>
<!-- /.container -->



<?php include_once "includes/footer.php"; ?>