<?php
include "../../../../connection/connection.php";

// Fungsi untuk mengambil daftar kategori dari database
function getCategories()
{
    global $con;

    $query = "SELECT * FROM categories";
    $result = mysqli_query($con, $query);

    $categories = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }

    return $categories;
}

// Menambahkan kategori baru jika ada data yang dikirimkan
if (isset($_POST['save'])) {
    $categoryName = $_POST['name_category'];
    $categorySlug = $_POST['slug_category'];

    $query = "INSERT INTO categories (name_category, slug_category) VALUES ('$categoryName', '$categorySlug')";
    mysqli_query($con, $query);

    header('location:category.php');
}

// Menggunakan fungsi untuk mendapatkan daftar kategori
// $categories = getCategories();
?>