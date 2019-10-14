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
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM `tbl_posts` WHERE `tbl_posts`.`post_id` = $id";
                $result = $db->query($sql) or die($db->error);;
                $row = $result->fetch_assoc();
                ?>
                <!-- Title -->
                <h1 class="mt-4"><?php echo $row['post_title']; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by
                    <a href="#"><?php echo $row['post_author']; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>Posted on <?php echo $row['post_date']; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-fluid" src="images/<?php echo $row['post_image']; ?>" alt="Card image cap">

                <hr>

                <!-- Post Content -->
                <p class="lead"> <?php echo $row['post_content']; ?> </p>

                <hr>
            <?php }
            ?>
            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Single Comment -->
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                    purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
        </div>
        <!-- Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?php include_once "includes/footer.php"; ?>