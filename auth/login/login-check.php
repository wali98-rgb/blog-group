<?php
    session_start();
    include "../../connection/connection.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($con, "select * from users where username='$username' and password='$password'");

    $cek = mysqli_num_rows($data);

    if ($cek > 0) {
        $d = mysqli_fetch_assoc($data);

        if ($d['level'] == 'Admin') {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = 'Admin';
            $_SESSION['status'] = 'login';

            header('location:../../pages/admin/index.php');
        } else if ($d['level'] == 'User') {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = 'User';
            $_SESSION['status'] = 'login';

            header('location:../../pages/user/index.php');
        } else if ($d['level'] == 'Journalist') {
            $_SESSION['id'] = $d['id_user'];
            $_SESSION['username'] = $username;
            $_SESSION['level'] = 'Journalist';
            $_SESSION['status'] = 'login';

            header('location:../../pages/user/index.php');
        }
    } else {
        header('location:login.php?pesan=gagal');
    }
?>