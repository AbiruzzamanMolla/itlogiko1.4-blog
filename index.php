<?php include_once "includes/header.php"; ?>
<?php include "db/conn.php"; ?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Small Scale Blog - ITLogiko 1.4</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container-fluid">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-9 mt-4">
            <?php
            $sql = "SELECT * FROM `tbl_posts`";
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <!-- Blog Post -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $row['post_title']; ?></h2>
                        <p class="card-text"><img class="rounded float-left postImage" src="images/<?php echo $row['post_image']; ?>" alt="Card image cap"><?php echo $row['post_content']; ?></p>
                        <a href="post.php?id=<?php echo $row['post_id']; ?>" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on <?php echo $row['post_date']; ?> by
                        <a href="#"><?php echo $row['post_author']; ?></a>
                    </div>
                </div>
            <?php }
            ?>
            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-3">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Login:</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="email">
                        <input type="text" class="form-control" placeholder="password">
                        <span class="input-group-btn pl-1">
                            <button class="btn btn-secondary" type="button">Login!</button>
                        </span>
                    </div>
                </div>
            </div>

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
                                        <a href="showByCat.php?cat_id=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a> 
                                    </li>
                                    <hr>
                                <?php }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>


    </div>
    <!-- /.row -->

</div>
<!-- /.container -->



<?php include_once "includes/footer.php"; ?>