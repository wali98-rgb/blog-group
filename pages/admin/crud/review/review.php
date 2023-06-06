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

    <title>Review Page | I-News</title>
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
        <nav class="navbar" style="background-color: aqua; border-bottom: 1px solid silver">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="..\..\..\..\img\logo\logo_nb.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Independent <span>News</span>
                </a>
                <a class="navbar-brand" href="review.php">Reviews</a>
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
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="../article/article.php" role="tab" aria-controls="profile">Article</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="../category/category.php" role="tab" aria-controls="messages">Category</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="../user/user.php" role="tab" aria-controls="settings">User</a>
                            <a class="list-group-item list-group-item-action active" id="list-settings-list" data-toggle="list" href="review.php" role="tab" aria-controls="settings">Review</a>
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
                        <h1>Review Page</h1>
                        <!-- Show Review Start -->
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Review List</h3>
                            </div>

                            <!-- Table Session Start -->
                            <div class="card-body">
                                <!-- Check Item Database Start -->
                                <?php
                                    include "../../../../connection/connection.php";

                                    $no = 1;
                                    $data = mysqli_query($con, "select
                                        articles.id_article, articles.title_article, articles.review_article, articles.id_category,
                                        categories.id_category, categories.name_category
                                        from articles, categories
                                        where articles.id_category=categories.id_category
                                        order by articles.title_article asc
                                    ");
                                ?>
                                <!-- Check Item Database End -->
                                <table class="table table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th style="width: 40px;">#</th>
                                            <th>Title Article</th>
                                            <th>Category Article</th>
                                            <th style="width: 150px;">Total Review</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Looping Data Start -->
                                        <?php
                                            while ($d = mysqli_fetch_array($data)) {
                                                $id_art = $d['id_article'];
                                        ?>
                                        <!-- Looping Data End -->
                                        <tr align="center">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['title_article']; ?></td>
                                            <td><?php echo $d['name_category']; ?></td>
                                            <td>
                                                <span class="badge bg-danger"><?php echo $d['review_article']; ?></span>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr align="center">
                                            <th style="width: 40px;">#</th>
                                            <th>Title Article</th>
                                            <th>Category Article</th>
                                            <th style="width: 150px;">Total Review</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- Table Session End -->
                        </div>
                        <!-- Show Review End -->
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