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
    <nav>
        <nav class="navbar bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="..\..\..\..\img\logo\logo_nb.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Independent <span>News</span>
                </a>
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php echo $_SESSION['username']; ?>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin/crud/article/article.php">Article</a>
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
                </div>
        </nav>

        <!-- Navbar Nav Start -->
        <div>
            <span>Dashboard</span>
            <a href="#">Search</a>
            <a href="../../../../auth/logout.php">Logout</a>
        </div>
        <!-- Navbar Nav End -->
    </nav>
    <!-- Navbar End -->

    <!-- Sidebar Start -->
    <section>
        <div>
            <!-- Username Admin Start -->
            <ul>
                <li><?php echo $_SESSION['username']; ?></li>
            </ul>
            <!-- Username Admin End -->

            <!-- Button Action Start -->
            <ul>
                <li><a href="../../index.php">Dashboard</a></li>
                <li><a href="article.php">Articles</a></li>
                <li><a href="../category/category.php">Category</a></li>
                <li><a href="../user/user.php">User</a></li>
                <li><a href="../review/review.php">Review</a></li>

                <!-- Partition Start -->
                <hr size="2px" color="black">
                <!-- Partition End -->

                <!-- User Page Start -->
                <span>User Page</span> <br>
                <a href="../../../user/index.php">View User Page</a>
                <!-- User Page End -->
            </ul>
            <!-- Button Action End -->
        </div>
    </section>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content-wrapper">
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
                                        articles.id_article, articles.cover_article, articles.title_article, articles.slug_article, articles.desc_article, articles.id_category,
                                        categories.id_category, categories.name_category, categories.slug_category
                                        from articles, categories
                                        where articles.id_category=categories.id_category
                                        order by articles.title_article asc
                                    ");

                                // while ($d = mysqli_fetch_array($data)) {
                                foreach ($data as $d) {
                            ?>

                                    <div class="card col-3 p-2 m-2">
                                        <img class="card-img-top img-thumbnail rounded" src="<?php echo 'cover_article/' . $d['cover_article']; ?>" alt="Cover Article <?php echo $d['title_article']; ?>">
                                        <div class="card-body">
                                            <a style="display: block; text-align: right; text-decoration: none;" href="category.php?slug=<?php echo $d['slug_category']; ?>" class="text-danger text-right"><?php echo $d['name_category']; ?></a>
                                            <h5 class="card-title"><?php echo $d['title_article']; ?></h5>
                                            <p style="text-align: justify;" class="card-text"><?php echo substr($d['desc_article'], 0, 100) . "..."; ?></p>
                                            <div class="">
                                                <a href="show.php?slug=<?php echo $d['slug_article']; ?>" class="btn btn-primary">View</a>
                                                <a href="update.php?slug=<?php echo $d['slug_article']; ?>" class="btn btn-warning">Edit</a>
                                                <a href="delete.php?slug=<?php echo $d['slug_article']; ?>" class="btn btn-danger">Delete</a>
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