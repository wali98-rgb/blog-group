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
        <!-- Navbar Logo Start -->
        <h1>Independent<span>News</span>.</h1>
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
            <div class="container-fluid">
                <h1>Create Article Page</h1>
                <a href="article.php" class="btn btn-danger mb-2">Back</a>
                <!-- Form Article Start -->
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Create Article</h3>
                        </div>
    
                        <!-- Form Article Session Start -->
                        <div class="card-body">
                            <form action="create-act.php" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                                <div class="form-group mb-4">
                                    <label for="cover_article"><h5>Cover Input</h5></label>
                                    <input type="file" name="cover_article" class="form-control" id="cover_article">
                                    <div class="valid-feedback">
                                        The cover was choosed
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="title_article"><h5>Title Article</h5></label>
                                    <input type="text" name="title_article" class="form-control" id="title_article" placeholder="Input Title for Article..." autofocus required>
                                    <div class="valid-feedback">
                                        The title was choosed
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a title
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="slug_article"><h5>Slug Article</h5></label>
                                    <input type="text" name="slug_article" class="form-control" id="slug_article" placeholder="Input Slug..." required>
                                    <div class="valid-feedback">
                                        The slug was choosed
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a slug
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="desc_article"><h5>Description Article</h5></label>
                                    <textarea class="form-control" name="desc_article" id="desc_article" rows="5" placeholder="Input Description for Article..." required></textarea>
                                    <div class="valid-feedback">
                                        The description was choosed
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide a description
                                    </div>
                                </div>
                                
                                <div class="form-group mb-4 input-group align-self-center">
                                    <label for="id_category"><h5>Category</h5></label>

                                    <!-- Check Category List Start -->
                                    <?php
                                        include "../../../../connection/connection.php";

                                        $category = mysqli_query($con, "select * from categories");
                                    ?>
                                    <!-- Check Category List End -->
                                    
                                    <select style="width: 100%; height: 40px;" class="custom-select rounded" name="id_category" id="id_category">
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
                                
                                <div class="form-group mb-4 input-group align-self-center">
                                    <label for="id_user"><h5>Publisher</h5></label>

                                    <!-- Check Category List Start -->
                                    <?php
                                        include "../../../../connection/connection.php";

                                        $user = mysqli_query($con, "select * from users where level='Journalist'");
                                    ?>
                                    <!-- Check Category List End -->
                                    
                                    <select style="width: 100%; height: 40px;" class="custom-select rounded" name="id_user" id="id_user">
                                        <option selected disabled>-- Select Publisher --</option>

                                        <?php while ($us = mysqli_fetch_array($user)) { ?>

                                        <option value="<?php echo $us['username']; ?>"><?php echo $us['username']; ?></option>

                                        <?php } ?>
                                    </select>
                                    <div class="valid-feedback">
                                        The publisher was choosed
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a publisher
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-success" name="save" id="" value="Add">
                            </form>
                        </div>
                        <!-- Form Article Session End -->
                    </div>
                </div>
                <!-- Form Article End -->
            </div>
        </section>
    </div>
    <!-- Content End -->

    <!-- Footer Start -->
    <!-- Footer End -->
    
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

    <!-- My Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>