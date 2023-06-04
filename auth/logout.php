<?php
    session_start();

    $_SESSION['status'] = "logout";
    // Menghapus Session
    session_destroy();

    header('location:../pages/user/index.php');
?>