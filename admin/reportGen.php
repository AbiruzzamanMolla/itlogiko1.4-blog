<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="vendor/select2/css/select2.min.css">
<div id="wrapper">

    <!-- Sidebar -->
    <?php include "inc/sidebar.php"; ?>

    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- Page Content -->
            <div class="col-md-12">
                <style>
                    label {
                        padding-bottom: 3px;
                        font-weight: bolder;
                    }

                    .select {
                        width: 210px !important;
                    }

                    .my-custom-scrollbar {
                        position: relative;
                        height: 350px;
                        width: 100%;
                        overflow: auto;
                    }

                    .table-wrapper-scroll-y {
                        display: block;
                    }
                </style>
                <form action="" method="post" class="form-inline" id="export">
                    <div class="row">
                        <div class="col">
                            <label for="category">Category</label>
                            <select name="category[]" id="category" class="form-control select" multiple="multiple">
                                <?php showCat(); ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="users">User</label>
                            <select name="users[]" id="users" class="form-control select" multiple="multiple">
                                <?php showUsers(); ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>
                        <div class="col">
                            <label for="tags">Tags</label>
                            <select name="tags[]" id="tags" class="form-control select" multiple="multiple">
                                <?php showTags(); ?>
                            </select>
                        </div>
                        <div class="col mt-4">
                            <input type="submit" value="Submit" id="report" name="report" class="btn btn-success">
                        </div>
                </form>
                <hr><br>
                <div class="table-wrapper-scroll-y my-custom-scrollbar pt-1">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Author</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = '';
                            if (isset($_POST['report'])) {
                                $category = isset($_POST['category']) ? $_POST['category'] : '';
                                $users = isset($_POST['users']) ? $_POST['users'] : '';
                                $date = $_POST['date'] ? date_format(date_create($_POST['date']), "D, F d, Y") : '';
                                $tags = isset($_POST['tags']) ? $_POST['tags'] : '';

                                $query = "SELECT * FROM `tbl_posts` WHERE ";
                                if ($category) {
                                    if (count($category, COUNT_NORMAL) == 1) {
                                        $query .= "`post_category_id` = $category[0]";
                                    } else {
                                        $delq = '';
                                        foreach ($category as $cat) {
                                            $delq .= " OR " . "`post_category_id` = $cat";
                                        }
                                        $delq = substr($delq, 4);
                                        $query .= $delq;
                                    }
                                }
                                if ($users) {
                                    if ($category) {
                                        $query .= " AND ";
                                    }
                                    if (count($users, COUNT_NORMAL) == 1) {
                                        $query .= "`post_author` = '$users[0]'";
                                    } else {
                                        $delq = '';
                                        foreach ($users as $user) {
                                            $delq .= " OR " . "`post_author` = '$user'";
                                        }
                                        $delq = substr($delq, 4);
                                        $query .= $delq;
                                    }
                                }
                                if ($date) {
                                    if ($category || $users) {
                                        $query .= " AND ";
                                    }
                                    $query .= "`post_date` LIKE '%{$date}%'";
                                }

                                if ($tags) {
                                    if ($category || $users || $date) {
                                        $query .= " AND ";
                                    }
                                    if (count($tags, COUNT_NORMAL) == 1) {
                                        $query .= "`post_tags` LIKE '%{$tags[0]}%'";
                                    } else {
                                        $delq = '';
                                        foreach ($tags as $tag) {
                                            $delq .= " OR " . "`post_tags` LIKE '%{$tag}%'";
                                        }
                                        $delq = substr($delq, 4);
                                        $query .= $delq;
                                    }
                                }
                                $result = $db->query($query);
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['post_id'] ?></th>
                                        <td><?php echo $row['post_title'] ?></td>
                                        <td><?php echo $row['post_content'] ?></td>
                                        <td><?php echo $row['post_author'] ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <form class="pt-2 m-auto" action="sReq/export.php" method="post"><button name="export" class="btn btn-success" value="<?php echo $query; ?>">Export to xls</button></form>
            </div>
        </div>
        <!-- /.container-fluid -->
        <?php include "inc/footer.php"; ?>

        <html>

        <body>
            <script src="vendor/select2/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#category').select2();
                    $('#tags').select2();
                    $('#users').select2();
                });
            </script>
        </body>

        </html>