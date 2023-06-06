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

    <!-- Ajax Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    
    <!-- My Style -->
    <link rel="stylesheet" href="../../user/css/styles.css" />
    
    <!-- logo -->
    <link rel="icon" href="..\..\..\img\logo\logo_nb.png">

    <title>Journalist Page | I-News</title>
</head>
<body onload="displayDate()">
    <!-- Check Login Start -->
    <?php
        if (session_start()) {
            if ($_SESSION['status'] != "login") {
                header('location:../../user/index.php');
            } else if ($_SESSION['status'] == "login" && $_SESSION['level'] == "User") {
                header('location:../../user/index.php');
            } else if ($_SESSION['status'] == "login" && $_SESSION['level'] == "Admin") {
                header('location:../../admin/index.php');
            }
        }
    ?>
    <!-- Check Login End -->

    <!-- Navbar Start -->
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
                if (isset($_SESSION['status'])) {
                    if ($_SESSION['status'] == "login" && $_SESSION['level'] == "Journalist") {
                        echo $_SESSION['username'];
            ?>
                        <a href="../article.php">Add Article</a>
                        <a href="../../../auth/logout.php">Logout</a>
            <?php
                    } else if ($_SESSION['status'] == "login") {
                        echo $_SESSION['username'];
            ?>
                        <a href="../../../auth/logout.php">Logout</a>
            <?php
                    } else if ($_SESSION['status'] != "login") {
            ?>
                        <a href="../../../auth/login/login.php">Login</a>
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
    <!-- Navbar End -->

    <?php
        echo $_SESSION['username'];
    ?>
    <!-- Sidebar Start -->
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content-wrapper">
        <section class="content" style="padding: 0 15%">
            <!-- Card Content Start -->
            <div class="container-fluid">
                <!-- Card Session -->
                <div class="card-default">
                    <div class="card-header mb-3">
                        <h3 class="card-title text-dark">Halaman Pembuatan Artikel</h3>
                    </div>
                    <!-- Show Article Start -->
                    <div class="card-body mb-5">
                        <a class="btn btn-danger mb-3" href="../article.php">Kembali</a>
                        <div class="container-fluid justify-content-center">
                            <div style="box-shadow: 5px 5px 20px -10px black; border-radius: 1rem; background-color: darkgray;">
                                <!-- From Session Start -->
                                <form action="create-act.php" class="text-dark needs-validation p-5" method="POST" enctype="multipart/form-data" novalidate>
                                    <div class="form-group mb-4">
                                        <label for="cover_article"><h4>Cover Input</h4></label>
                                        <input type="file" name="cover_article" class="form-control" id="cover_article">
                                        <div class="valid-feedback">
                                            The cover was choosed
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="title_article"><h4>Title Article</h4></label>
                                        <input style="height: 40px;" type="text" name="title_article" class="form-control" id="title_article" placeholder="Input Title for Article..." autofocus required>
                                        <div class="valid-feedback">
                                            The title was choosed
                                        </div>
                                        <div class="invalid-feedback">
                                            Please choose a title
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="slug_article"><h4>Slug Article</h4></label>
                                        <input type="text" name="slug_article" class="form-control" id="slug_article" placeholder="Input Slug..." required>
                                        <div class="valid-feedback">
                                            The slug was choosed
                                        </div>
                                        <div class="invalid-feedback">
                                            Please choose a slug
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="desc_article"><h4>Description Article</h4></label>
                                        <textarea class="form-control" name="desc_article" id="desc_article" rows="5" placeholder="Input Description for Article..." required></textarea>
                                        <div class="valid-feedback">
                                            The description was choosed
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a description
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4 input-group align-self-center">
                                        <label for="id_category"><h4>Category</h4></label>

                                        <!-- Check Category List Start -->
                                        <?php
                                            include "../../../connection/connection.php";

                                            $category = mysqli_query($con, "select * from categories");
                                        ?>
                                        <!-- Check Category List End -->
                                        
                                        <select style="width: 100%; height: 40px;" class="custom-select rounded" name="id_category" id="id_category" required>
                                            <option selected disabled>-- Select Category --</option>

                                            <?php while ($cat = mysqli_fetch_array($category)) { ?>

                                            <option value="<?php echo $cat['id_category']; ?>"><?php echo $cat['name_category']; ?></option>

                                            <?php } ?>
                                        </select>
                                        <div class="valid-feedback">
                                            The category was choosed
                                        </div>
                                        <div class="invalid-feedback">
                                            Please choose a category
                                        </div>
                                    </div>
                                    
                                    <input type="submit" class="btn btn-success" name="save" id="" value="Add">
                                </form>
                                <!-- From Session End -->
                            </div>
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

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
    </script>

    <!-- My Feather Icons JS -->
    <script>
        feather.replace()
    </script>

    <!-- My Javascript -->
    <script src="../../user/js/script.js"></script>

    <!-- My Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>