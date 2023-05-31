<?php
    include "../../../../connection/connection.php";

    if (isset($_POST['save'])) {
        mysqli_query($con, "INSERT INTO users SET
            username = '$_POST[username]',
            email = '$_POST[email]',
            password = '$_POST[password]',
            level = 'User'
        ");

        header('location:user.php');
    }
?>