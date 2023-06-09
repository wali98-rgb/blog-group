<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- My Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- My Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,800;1,100;1,200;1,300;1,400;1,600;1,800&display=swap" rel="stylesheet">

    <!-- Icon Logo -->
    <link rel="icon" href="../../../../img/logo/logo_nb.png" />

    <title>Article Page | I-News</title>
</head>

<body>
    <!-- Check Login Start -->
    <?php
    if (session_start()) {
        if ($_SESSION['status'] != "login") {
            header('location:../../auth/login/login.php');
        } else if ($_SESSION['status'] == "login" && $_SESSION['level'] == "User") {
            header('location:../user/index.php');
        }
    }
    ?>
    <!-- Check Login End -->

    <!-- Navbar Start -->
    <nav class="navbar" style="background-color: aqua; border-bottom: 1px solid silver">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="..\..\..\..\img\logo\logo_nb.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Independent <span>News</span>
            </a>
            <a class="navbar-brand" href="article.php">Articles</a>
            <div>
                <a class="text-dark mr-2" href="#"><i data-feather="search"></i></a>
                <a class="btn btn-danger ml-2" href="../../../../auth/logout.php"><i data-feather="log-out"></i> Logout</a>
            </div>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="crud/article/article.php">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="crud/category/category.php">Categoty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="crud/user/user.php">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="crud/review/review.php">Review</a>
                    </li>
                </ul>
            </div> -->
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="row p-3">
        <!-- Sidebar Start -->
        <section class="col-3">
            <div>
                <!-- Username Admin Start -->
                <h3 class="text-dark" style="display: flex; align-items: center;"><i data-feather="user"></i> &nbsp;<label for=""><?php echo $_SESSION['username']; ?></label></h3>
                <!-- Username Admin End -->

                <!-- Button Action Start -->
                <div class="">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="../../index.php" role="tab" aria-controls="home">Home</a>
                        <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="article.php" role="tab" aria-controls="profile">Article</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="../category/category.php" role="tab" aria-controls="messages">Category</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="../user/user.php" role="tab" aria-controls="settings">User</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="../review/review.php" role="tab" aria-controls="settings">Review</a>
                    </div>
                    <hr size="2px" color="black">
                    <h3 class="text-primary">User Page</h3>
                    <a class="btn btn-primary" href="../../../user/index.php">View User Page</a>
                </div>
                <!-- Button Action End -->
            </div>
        </section>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content-wrapper col-9">
            <section class="content">
                <!-- Card Content Start -->
                <div class="container-fluid">
                    <h1>Article Page</h1>
                    <a href="create.php" class="btn btn-success mb-2">Create Article</a>
                    <!-- Show Article List -->
                    <div class="card card-default color-palette-box">
                        <div class="card-header">
                            <h3 class="card-title">Article List</h3>
                        </div>

                        <!-- Card Session Start -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <!-- Check Item Database Start -->
                                <?php
                                include "../../../../connection/connection.php";

                                $dat = mysqli_query($con, "select * from articles");

                                $check = mysqli_num_rows($dat);
                                if ($check > 0) {
                                    $data = mysqli_query($con, "select
                                            articles.id_article, articles.cover_article, articles.title_article, articles.slug_article, articles.desc_article, articles.review_article, articles.username, articles.id_category,
                                            categories.id_category, categories.name_category, categories.slug_category
                                            from articles, categories
                                            where articles.id_category=categories.id_category
                                            order by articles.title_article asc
                                        ");

                                    // while ($d = mysqli_fetch_array($data)) {
                                    foreach ($data as $d) {
                                ?>

                                        <div class="card col-3 p-2 m-2">
                                            <img style="object-fit: cover; height: 200px;" class="card-img-top img-thumbnail rounded" src="<?php echo 'cover_article/' . $d['cover_article']; ?>" alt="Cover Article <?php echo $d['title_article']; ?>">
                                            <div class="card-body">
                                                <a style="display: block; text-align: right; text-decoration: none;" href="category.php?slug=<?php echo $d['slug_category']; ?>" class="text-danger text-right"><?php echo $d['name_category']; ?></a>
                                                <h5 class="card-title"><?php echo $d['title_article']; ?></h5>
                                                <small>Penerbit : <span class="badge bg-success"><?php echo $d['username']; ?></span></small>
                                                <p style="text-align: justify;" class="card-text"><?php echo substr($d['desc_article'], 0, 100) . "..."; ?></p>
                                                <div class="d-flex align-self-end justify-content-center">
                                                    <a href="show.php?slug=<?php echo $d['slug_article']; ?>" class="btn btn-primary m-1">View</a>
                                                    <a href="update.php?slug=<?php echo $d['slug_article']; ?>" class="btn btn-warning m-1">Edit</a>
                                                    <a href="delete.php?slug=<?php echo $d['slug_article']; ?>" class="btn btn-danger m-1">Delete</a>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                } else if ($check == 0) {
                                    ?>
                                    <h3 class="text-center">Not Article Available</h3>
                                <?php
                                }
                                ?>
                                <!-- Check Item Database End -->
                            </div>
                        </div>
                        <!-- Card Session End -->
                    </div>
                </div>
                <!-- Card Content End -->
            </section>
        </div>
        <!-- Content End -->
    </div>

    <!-- Footer Start -->
    <!-- Footer End -->

    <!-- My Feather Icons JS -->
    <script>
        feather.replace()
    </script>

    <!-- My Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>