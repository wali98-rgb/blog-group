<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Ajax Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- My Style -->
    <link rel="stylesheet" href="css/style.css" />

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

    <!-- logo -->
    <link rel="icon" href="..\..\img\logo\logo_nb.png">
    <title>Dashboard Page | I-News</title>
</head>
<body onload="displayDate()">
    <!-- Navbar start -->
    <nav class="navbar">
        <div class="date">
            <p id="tanggal"></p>
        </div>

        <div class="logo">
            <a>The Independent News</a>
        </div>

        <div class="navbar-nav">
            <a href="index.html" class="now">Home</a>
            <a href="display/kategori/nasional.html">Nasional</a>
            <a href="display/kategori/internasional.html">Internasional</a>
            <a href="display/kategori/politik.html">Politik</a>
            <a href="display/kategori/ekonomi.html">Ekonomi</a>
            <a href="display/kategori/olahraga.html">Olahraga</a>
            <a href="display/kategori/teknologi.html">Teknologi</a>
            <a href="display/kategori/otomotif.html">Otomotif</a>
            <a href="display/kategori/hiburan.html">Hiburan</a>
            <a href="display/kategori/gayahidup.html">Gaya Hidup</a>
            <?php
                session_start();
                if (isset($_SESSION['status'])) {
                    if ($_SESSION['status'] == "login") {
                        echo $_SESSION['username'];
            ?>
                        <a href="../../auth/logout.php">Logout</a>
            <?php
                    } else if ($_SESSION['status'] != "login") {
            ?>
                        <a href="../../auth/login/login.php">Login</a>
            <?php
                    }
                }
            ?>
        </div>

        <div class="navbar-extra">
            <a href="#" id="search-button"><i data-feather="search"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>

        <!-- Search Form start -->
        <div class="search-form">
            <input type="search" id="search-box" placeholder="search here..." />
            <label for="search-box"><i data-feather="search"></i></label>
        </div>
        <!-- Search Form end -->
    </nav>
    <!-- Navbar end -->
    
    <!-- Content Start -->
    <div class="content-wrapper">
        <section class="content" style="padding: 0 7%">
            <!-- Card Content Start -->
            <div class="container-fluid">
                <div class="article">
                    <div class="jumbotron-fluid">
                        <h1 class="text-lg my-3">Berita Terkini.</h1>
                        <div class="d-flex berita">
                            <img style="object-fit: cover;" src="img/j-g-plate.jpg" alt="Gambar Artikel Pertama">
                            <div class="konten">
                                <a href="#">Menkominfo Johnny G Plate ditahan sebagai tersangka, Istana tegaskan tak akan intervensi kasus dugaan korupsi pembangunan infrastruktur Kominfo</a>
                                <p class="author">Pihak Istana mengatakan Presiden Joko Widodo tidak akan mengintervensi penyelesaian kasus dugaan korupsi yang menjerat Menteri Komunikasi dan Informasi (Menkominfo) Johnny G Plate.</p>
                                <p class="date">17 Mei 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card Session -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Berita Lainnya</h3>
                    </div>
                    <!-- Show Article Start -->
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <!-- Check Item Database Start -->
                            <?php
                                include "../../connection/connection.php";

                                $data = mysqli_query($con, "select
                                    articles.id_article, articles.cover_article, articles.title_article, articles.slug_article, articles.desc_article, articles.id_user, articles.id_category,
                                    users.id_user, users.username,
                                    categories.id_category, categories.name_category, categories.slug_category
                                    from articles, users, categories
                                    where articles.id_user=users.id_user
                                    and articles.id_category=categories.id_category
                                    order by articles.title_article asc
                                ");

                                while ($d = mysqli_fetch_array($data)) {
                            ?>
                            <!-- Check Item Database End -->
                            <div class="card col-3 m-2">
                                <img style="height: 250px; object-fit: cover; width: 200px;" class="card-img-top img-thumbnail rounded mx-auto mt-3" src="<?php echo '../admin/crud/article/cover_article/' . $d['cover_article']; ?>" alt="<?php echo $d['title_article']; ?>">
                                <hr>
                                <div class="card-body">
                                    <a style="display: block; text-align: right; text-decoration: none;" href="category.php?slug=<?php echo $d['slug_category']; ?>" class="text-danger text-right"><?php echo $d['name_category']; ?></a>
                                    <h5 class="card-title"><?php echo $d['title_article']; ?></h5>
                                    <small>Penerbit : <span class="badge bg-success"><?php echo $d['username']; ?></span></small>
                                    <p style="text-align: justify;" class="card-text"><?php echo substr($d['desc_article'], 0, 100) . "..."; ?></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Show Article End -->
                </div>
            </div>
            <!-- Card Content End -->
        </section>
    </div>
    <!-- Content End -->
    
    <!-- My Feather Icons JS -->
    <script>
        feather.replace()
    </script>

    <!-- My Javascript -->
    <script src="js/script.js"></script>

    <!-- My Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>