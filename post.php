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
                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header mb-3">Leave a Comment:</h5>
                    <div class="card-body">
                        <?php
                        $class= '';
                        if(isset($_POST['submit'])){
                            $post_id = $_POST['post_id'];
                            $username = $_POST['username'];
                            $comment_body = $_POST['comment_body'];
                            $query = "INSERT INTO `tbl_comment`(`post_id`, `username`, `comment_body`) VALUES ($post_id,'$username', '$comment_body')";
                            $result = $db->query($query);
                            if($result){
                                echo "<span class='alert alert-warning float-center'>Please wait for admin approval for your comment!</span>";
                                $class = 'p-4 m-4';
                            }
                        }
                        ?>
                        <form action="" method="post" class="<?php echo $class ?>">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Enter your name..">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="comment_body" rows="3"></textarea>
                            </div>
                            <input type="hidden" name="post_id" value="<?php echo $id; ?>">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Single Comment -->
                <?php
                    $sql = "SELECT * FROM `tbl_comment` WHERE `post_id` = $id AND `status`= 1";
                    $result = $db->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        ?>
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $row['username']; ?></h5>
                            <?php echo $row['comment_body']; ?>
                        </div>
                    </div>
                    <hr>
            <?php }
            }
            ?>
        </div>
        <!-- Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?php include_once "includes/footer.php"; ?>