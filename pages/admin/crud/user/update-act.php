<?php
    include "../../../../connection/connection.php";

    $id = $_POST['id_user'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    mysqli_query($con, "UPDATE users SET username='$username', email='$email', password='$password' WHERE id_user='$id'");

    header('location:user.php');
?>