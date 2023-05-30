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
if (isset($_POST['name_category'])) {
    $categoryName = $_POST['name_category'];

    $query = "INSERT INTO categories (name_category) VALUES ('$categoryName')";
    mysqli_query($con, $query);
}

// Menggunakan fungsi untuk mendapatkan daftar kategori
$categories = getCategories();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- My Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- My Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,800;1,100;1,200;1,300;1,400;1,600;1,800&display=swap" rel="stylesheet">

    <title>Category Page | I-News</title>
</head>

<body>
    <!-- Form untuk menambahkan kategori baru -->
    <h2>Tambah Kategori Baru</h2>
    <form method="POST" action="">
        <input type="text" name="name_category" placeholder="Nama Kategori" required>
        <button type="submit">Tambah</button>
    </form>

    <!-- Menampilkan daftar kategori -->
    <h2>Daftar Kategori</h2>
    <ul>
        <?php foreach ($categories as $category) : ?>
            <li><?= $category['name_category']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>