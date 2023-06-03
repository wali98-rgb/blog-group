<?php
    include "../../../../connection/connection.php";

    $id_art = $_POST['id_article'];
    $cover_art = $_POST['cover_article'];
    $title_art = $_POST['title_article'];
    $slug_art = $_POST['slug_article'];
    $desc_art = $_POST['desc_article'];
    $id_cat = $_POST['id_category'];

    if (isset($_POST['update'])) {
        $query = mysqli_query($con, "SELECT * FROM articles WHERE id_article='$id_art'");
        
        $FF = mysqli_fetch_array($query);
        if ($cover_art === "") {
            mysqli_query($con, "UPDATE articles SET title_article = '$title_art', slug_article = '$slug_art', desc_article = '$desc_art', id_category = '$id_cat' WHERE id_article = '$id_art'");
        } else if ($cover_art != $FF['cover_article']) {
            $deleteFF = "cover_article/$FF[cover_article]";
            unlink($deleteFF);

            $extention_valid = array('png', 'jpg', 'jpeg');
            $cover = $_FILES['cover_article']['name'];
            $ex = explode('.', $cover);
            $extention = strtolower(end($ex));
            $size = $_FILES['cover_article']['size'];
            $file_tmp = $_FILES['cover_article']['tmp_name'];

            if (in_array($extention, $extention_valid) === true) {
                if ($size < 1044070) {
                    move_uploaded_file($file_tmp, 'cover_article/' . $cover);
                    mysqli_query($con, "UPDATE articles SET cover_article = '$cover', title_article = '$title_art', slug_article = '$slug_art', desc_article = '$desc_art', id_category = '$id_cat' WHERE id_article = '$id_art'");
                }
            }
        } else if ($cover_art === $FF['cover_article']) {
            mysqli_query($con, "UPDATE articles SET title_article = '$title_art', slug_article = '$slug_art', desc_article = '$desc_art', id_category = '$id_cat' WHERE id_article = '$id_art'");
        }
    }

    header('location:article.php');
?>