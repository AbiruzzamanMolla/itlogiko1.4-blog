<?php include "inc/header.php"; ?>
<div id="wrapper">

  <!-- Sidebar -->
  <?php include "inc/sidebar.php"; ?>

  <div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add Post</li>
      </ol>

      <!-- Page Content -->
      <div class="col-md-9">
        hello <?php print_r($_SESSION); ?>
      </div>

    </div>
    <!-- /.container-fluid -->
    <?php include "inc/footer.php"; ?>