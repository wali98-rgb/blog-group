<?php
    include "../../../connection/connection.php";

    session_start();
    if (isset($_POST['save'])) {
        $extention_valid = array('png', 'jpg', 'jpeg');
        $cover = $_FILES['cover_article']['name'];
        $ex = explode('.', $cover);
        $extention = strtolower(end($ex));
        $size = $_FILES['cover_article']['size'];
        $file_tmp = $_FILES['cover_article']['tmp_name'];

        if (in_array($extention, $extention_valid) === true) {
            if ($size < 1044070) {
                move_uploaded_file($file_tmp, '../../admin/crud/article/cover_article/' . $cover);
                mysqli_query($con, "INSERT INTO articles SET
                    cover_article = '$cover',
                    title_article = '$_POST[title_article]',
                    slug_article = '$_POST[slug_article]',
                    desc_article = '$_POST[desc_article]',
                    username = '$_SESSION[username]',
                    id_category = '$_POST[id_category]'
                ");
            }
        }
    }

    header('location:../article.php');
?>