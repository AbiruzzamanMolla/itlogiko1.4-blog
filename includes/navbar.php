<?php
if (isset($_GET['logout']) && $_SESSION['id']) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Small Scale Blog - ITLogiko 1.4</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link active" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php
                if (isset($_SESSION['id'])) {
                    $id = $_SESSION['id'];
                    $username = $_SESSION['username'];
                    $userrole = $_SESSION['role'];
                        if ($userrole == 1) {
                            echo '<li class="nav-item"><a class="nav-link" href="admin">Admin</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="admin/?logout">Logout</a></li>';
                        } elseif ($userrole == 0) {
                            echo '<li class="nav-item"><a class="nav-link" href="add_user_post.php">Add Post</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="userprofile.php?uid=' . $id . '">Profile</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="?logout">Logout</a></li>';
                        }
                    } else {
                        echo '<li class="nav-item"><a class="nav-link btn btn-light text-black-50 btn-sm m-1" href="add_user_post.php">Add Post</a></li>';
                        echo '<li class="nav-item">
                            <a class="nav-link  btn btn-light text-black-50 btn-sm m-1" href="admin/login.php">Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  btn btn-light text-black-50 btn-sm m-1" href="admin/register.php">Register
                            </a>
                        </li>';
                        }
                    ?>
            </ul>
        </div>
    </div>
</nav>