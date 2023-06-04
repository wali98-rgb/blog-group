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
    <link rel="stylesheet" href="../user/css/style.css" />
    
    <!-- logo -->
    <link rel="icon" href="..\..\img\logo\logo_nb.png">

    <title>Journalist Page | I-News</title>
</head>
<body onload="displayDate()">
    <!-- Check Login Start -->
    <?php
        if (session_start()) {
            if ($_SESSION['status'] != "login") {
                header('location:../user/index.php');
            } else if ($_SESSION['status'] == "login" && $_SESSION['level'] == "User") {
                header('location:../user/index.php');
            } else if ($_SESSION['status'] == "login" && $_SESSION['level'] == "Admin") {
                header('location:../admin/index.php');
            }
        }
    ?>
    <!-- Check Login End -->

    <!-- Navbar Start -->
    <!-- <nav class="navbar">
        <div class="date">
            <p id="tanggal"></p>
        </div>

        <div class="logo">
            <a>The Independent News</a>
        </div>
        <a href="../../auth/logout.php">Logout</a>
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
            <a href="../../auth/login/login.php">Login</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="search-button"><i data-feather="search"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div> -->

        <!-- Search Form start -->
        <!-- <div class="search-form">
            <input type="search" id="search-box" placeholder="search here..." />
            <label for="search-box"><i data-feather="search"></i></label>
        </div> -->
        <!-- Search Form end -->
    </nav>
    <!-- Navbar End -->

    <?php
        $_SESSION['username'];
    ?>
    <!-- Sidebar Start -->
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content-wrapper">
        <section class="content">
            <!-- Card Content Start -->
            <div class="container-fluid">
                
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

    <!-- My Javascript -->
    <script src="../user/js/script.js"></script>

    <!-- My Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>