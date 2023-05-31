<?php
    include "../../../../connection/connection.php";

    $id = $_POST['id_category'];
    $name_category = $_POST['name_category'];
    $slug_category = $_POST['slug_category'];

    mysqli_query($con, "update categories set name_category='$name_category', slug_category='$slug_category' where id_category='$id'");

    header('location:category.php');
?>