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
    
    <title>Register Page | I-News</title>
</head>
<body>
    <!-- Check Login Start -->
    <?php
        session_start();
        
        if (isset($_SESSION['status'])) {
            if ($_SESSION['status'] == "login" && $_SESSION['level'] == "Admin") {
                header('location:../../pages/admin/index.php');
            } else if ($_SESSION['status'] == "login" && $_SESSION['level'] == "User") {
                header('location:../../pages/user/index.php');
            } else if ($_SESSION['status'] == "login" && $_SESSION['level'] == "Journalist") {
                header('location:../../pages/journal/article.php');
            } else if ($_SESSION['status'] == "logout") {
                header('location:regis.php');
            }
        }
    ?>
    <!-- Check Login End -->
    
    <!-- Navbar Start -->
    <!-- Navbar End -->

    <!-- Register Form Start -->
    <main>
        <h1>Register Form</h1>
        <form action="regis-action.php" method="POST">
            <div>
                <input type="text" name="username" id="username" placeholder="Username" autofocus required>
            </div>

            <div>
                <input type="email" name="email" id="email" placeholder="example@gmail.com" required>
            </div>

            <div>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>

            <input type="submit" name="simpan" id="" value="Register">
        </form>
        <small>Already Registered? <a href="../login/login.php">Login</a></small>
    </main>
    <!-- Register Form End -->

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