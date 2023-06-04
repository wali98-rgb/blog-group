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
    
    <title>Login Page | I-News</title>
</head>
<body>
    <!-- Navbar Start -->
    <!-- Navbar End -->

    <!-- Check Login Start -->
    <?php
        session_start();
        
        if (isset($_SESSION['status'])) {
            if ($_SESSION['status'] == "login" && $_SESSION['level'] == "Admin") {
                header('location:../../../admin/index.php');
            } else if ($_SESSION['status'] == "login" && $_SESSION['level'] == "User") {
                header('location:../../../user/index.php');
            } else if ($_SESSION['status'] == "login" && $_SESSION['level'] == "Journalist") {
                header('location:../../../user/index.php');
            } else if ($_SESSION['status'] == "logout") {
                header('location:login.php');
            }
        }
    ?>
    <!-- Check Login End -->
    
    <!-- Login Form Start -->
    <div class="d-flex col-md-12 text-center justify-content-center mx-auto" style="margin-top: 10rem;">
        <div class="login-box">
            <div class="login-logo">
                <h1>Login Page</h1>
            </div>

            <!-- Card Session Start -->
            <div class="card mt-4">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Login to start your session</p>

                    <!-- Form Login -->
                    <form action="login-check.php" method="POST">
                        <!-- Email Input -->
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" name="username" id="username" placeholder="Username" autofocus required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i data-feather="mail"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="input-group mb-3">
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <input class="btn btn-primary btn-block text-center col-12" type="submit" name="login" id="" value="Login">
                    </form>
                    <small>Not Registered? <a style="text-decoration: none;" href="../register/regis.php">Register</a></small>
                </div>
            </div>
            <!-- Card Session End -->
        </div>
    </div>
    <!-- Login Form End -->

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