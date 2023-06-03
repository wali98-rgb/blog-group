<?php
    include "../../../../connection/connection.php";

    $slug_art = $_GET['slug'];
    $query = mysqli_query($con, "select * from articles where slug_article='$slug_art'");

    $FF = mysqli_fetch_array($query);
    $deleteFF = "cover_article/$FF[cover_article]";
    unlink($deleteFF);

    mysqli_query($con, "delete from articles where slug_article='$slug_art'") or die(mysqli_error());
    header('location:article.php');
?>