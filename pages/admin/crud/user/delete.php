<?php
    include "../../../../connection/connection.php";

    $id = $_GET['id_user'];
    mysqli_query($con, "delete from users where id_user='$id'") or die(mysqli_error());

    header('location:user.php');
?>