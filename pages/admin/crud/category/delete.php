<?php
    include "../../../../connection/connection.php";

    $slug = $_GET['slug'];
    mysqli_query($con, "delete from categories where slug_category='$slug'") or die(mysqli_error($slug));

    header('location:category.php');
?>