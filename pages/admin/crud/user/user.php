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

    <title>User Page | I-News</title>
</head>

<body>
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
        <!-- Navbar Logo Start -->
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
                    </div>
            </nav>
            <!-- Navbar Logo End -->

            <!-- Navbar Nav Start -->
            <div>
                <span>Dashboard</span>
                <a href="#">Search</a>
                <a href="../../../../auth/logout.php">Logout</a>
            </div>
            <!-- Navbar Nav End -->
        </nav>
        <!-- Navbar End -->

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
                    <li><a href="../article/article.php">Articles</a></li>
                    <li><a href="../category/category.php">Category</a></li>
                    <li><a href="user.php">User</a></li>
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
        <section>
            <h1>User Page</h1>

            <!-- Card Content Start -->
            <div>
                <a href="create.php">Create User</a>
                <hr>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    include "../../../../connection/connection.php";

                    $data = mysqli_query($con, "select * from users where level = 'User'");

                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['username']; ?></td>
                            <td><?php echo $d['email']; ?></td>
                            <td>
                                <a href="show.php?id_user=<?php echo $d['id_user']; ?>">View</a>
                                <a href="update.php?id_user=<?php echo $d['id_user']; ?>">Edit</a>
                                <a href="delete.php?id_user=<?php echo $d['id_user']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </table>
            </div>
            <!-- Card Content End -->
        </section>
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