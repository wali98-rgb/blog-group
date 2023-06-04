<?php
    session_start();
    include "../../../../connection/connection.php";

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

            header('location:../../../admin/index.php');
        } else if ($d['level'] == 'User') {

            header('location:../../../../auth/login/login.php');
        } else if ($d['level'] == 'Journalist') {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = 'Journalist';
            $_SESSION['status'] = 'login';

            header('location:../../../user/index.php');
        }
    } else {
        header('location:login.php?pesan=gagal');
    }
?>