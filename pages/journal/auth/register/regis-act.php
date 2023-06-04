<?php
    include "../../../../connection/connection.php";

    if (isset($_POST['simpan'])) {
        mysqli_query($con, "INSERT INTO users SET
            username = '$_POST[username]',
            email = '$_POST[password]',
            password = '$_POST[password]',
            level = 'Journalist'
        ");

        header('location:../login/login.php');
    }
?>