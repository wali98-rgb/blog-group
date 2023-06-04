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
    <link rel="stylesheet" href="css/styles.css" />

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
    <nav class="navbars">
        <div class="dates">
            <p id="tanggal"></p>
        </div>

        <div class="logo">
            <a>The Independent News</a>
        </div>

        <div class="navbars-nav">
            <a href="index.html" class="now">Home</a>
            <a href="display/kategori/nasional.html">National</a>
            <a href="display/kategori/internasional.html">International</a>
            <a href="display/kategori/politik.html">Politic</a>
            <a href="display/kategori/ekonomi.html">Finance</a>
            <a href="display/kategori/olahraga.html">Sports</a>
            <a href="display/kategori/teknologi.html">Technology</a>
            <a href="display/kategori/otomotif.html">Automotive</a>
            <a href="display/kategori/hiburan.html">Entertaiment</a>
            <a href="display/kategori/gayahidup.html">LifeStyle</a>
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

        <div class="navbars-extra">
            <a href="#" id="search-button"><i data-feather="search"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>

        <!-- Search Form start -->
        <div class="search-forms">
            <input type="search" id="search-box" placeholder="search here..." />
            <label for="search-box"><i data-feather="search"></i></label>
        </div>
        <!-- Search Form end -->
    </nav>
    <!-- Navbar end -->
    
    <!-- Content Start -->
    <div class="content-wrapper" style="margin-top: 12rem;">
        <section class="content" style="padding: 0 15%">
            <!-- Card Content Start -->
            <div class="container-fluid">
                <div class="article">
                    <div class="jumbotron-fluid">
                        <h1 class="text-lg my-3">Berita Terkini.</h1>
                        <div class="d-flex berita">
                            <?php
                                include "../../connection/connection.php";

                                $data = mysqli_query($con, "select
                                    articles.id_article, articles.cover_article, articles.title_article, articles.slug_article, articles.desc_article, articles.id_user, articles.id_category,
                                    users.id_user, users.username,
                                    categories.id_category, categories.name_category, categories.slug_category
                                    from articles, users, categories
                                    where articles.id_user=users.id_user
                                    and articles.id_category=categories.id_category
                                    and articles.id_article='1'
                                    order by articles.title_article asc
                                ");

                                while ($dat = mysqli_fetch_array($data)) {
                            ?>
                            <img style="object-fit: cover;" src="<?php echo '../admin/crud/article/cover_article/' . $dat['cover_article']; ?>" alt="<?php echo $dat['title_article']; ?>">
                            <div class="konten" style="text-align: justify; text-decoration: none;">
                                <a href="show.php?slug=<?php echo $dat['slug_article']; ?>"><?php echo $dat['title_article']; ?></a>
                                <small style="display: flex; align-items: center;"><label for="">Penerbit : &nbsp;</label><span class="badge bg-success"><?php echo $dat['username']; ?></span></small>
                                <p class="author"><?php echo substr($dat['desc_article'], 0, 200) . "..."; ?></p>
                                <small style="display: flex; align-items: center;"><label for="">Kategori : &nbsp;</label><span class="text-danger"><?php echo $dat['name_category']; ?></span></small>
                                <p class="date">17 Mei 2023</p>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- Card Session -->
                <div class="card-default">
                    <div class="card-header mb-3">
                        <h3 class="card-title">Berita Lainnya</h3>
                    </div>
                    <!-- Show Article Start -->
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <!-- Check Item Database Start -->
                            <?php
                                include "../../connection/connection.php";

                                $datas = mysqli_query($con, "select
                                    articles.id_article, articles.cover_article, articles.title_article, articles.slug_article, articles.desc_article, articles.id_user, articles.id_category,
                                    users.id_user, users.username,
                                    categories.id_category, categories.name_category, categories.slug_category
                                    from articles, users, categories
                                    where articles.id_user=users.id_user
                                    and articles.id_category=categories.id_category
                                    order by articles.title_article asc
                                ");

                                while ($d = mysqli_fetch_array($datas)) {
                            ?>
                            <!-- Check Item Database End -->
                            <div class="col-3">
                                <img style="height: 180px; object-fit: cover; width: 400px;" class="card-img-top img-thumbnail rounded mx-auto mt-3" src="<?php echo '../admin/crud/article/cover_article/' . $d['cover_article']; ?>" alt="<?php echo $d['title_article']; ?>">
                                <hr>
                                <div class="card-body">
                                    <a style="display: block; text-align: right; text-decoration: none;" href="category.php?slug=<?php echo $d['slug_category']; ?>" class="text-danger text-right"><?php echo $d['name_category']; ?></a>
                                    <a class="card-title" href="show.php?slug=<?php echo $d['slug_article']; ?>"><h3><?php echo $d['title_article']; ?></h3></a>
                                    <small style="display: flex; align-items: center;"><label for="">Penerbit : &nbsp;</label><span class="badge bg-success"><?php echo $d['username']; ?></span></small>
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

    <!-- Footer start -->
    <footer class="footers">
        <div class="footers-left">
            <h3>Payment Method</h3>
            <div class="credit-cards">
                <img src="img/payment/visa.png" alt="" />
                <img src="img/payment/mastercard.png" alt="" />
                <img src="img/payment/paypal.png" alt="" />
            </div>
            <p class="footers-copyright">© KaijuStore 2023</p>
        </div>

        <div class="footers-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Indonesia</span> Jawa Barat, Bandung</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>+62 851-5521-0351</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p>
                    <a href="kaijustoreonline@gmail.com">kaijustoreonline@gmail.com</a>
                </p>
            </div>
        </div>

        <div class="footers-right">
            <p class="footers-about">
                <span>About</span>
                Kaiju is a Japanese media genre involving giant monsters. The word
                kaiju can also refer to the giant monsters themselves, which are
                usually depicted attacking major cities and battling either the
                military or other monsters. The kaiju genre is a subgenre of tokusatsu
                entertainment.
            </p>

            <div class="footers-media">
                <a href="https://www.youtube.com/channel/UCMYBh8nHoeUW0C2jcgUcLLw"
                    ><i class="fa fa-youtube"></i
                ></a>
                <a href="https://www.facebook.com/mohamad.rafli.562"
                    ><i class="fa fa-facebook"></i
                ></a>
                <a href="https://twitter.com/rafliadiprtm"
                    ><i class="fa fa-twitter"></i
                ></a>
                <a href="https://instagram.com/kaiju_store"
                    ><i class="fa fa-instagram"></i
                ></a>
                <a href="https://linktr.ee/kaiju_store"
                    ><i class="fa fa-linkedin"></i
                ></a>
            </div>
        </div>
    </footer>
    <!-- Footer end -->
    
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