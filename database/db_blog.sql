-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2023 pada 02.29
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `id_article` int(3) NOT NULL,
  `cover_article` varchar(40) NOT NULL,
  `title_article` varchar(40) NOT NULL,
  `slug_article` varchar(40) NOT NULL,
  `desc_article` longtext NOT NULL,
  `review_article` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `id_category` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`id_article`, `cover_article`, `title_article`, `slug_article`, `desc_article`, `review_article`, `username`, `id_category`) VALUES
(1, 'Avengers_Age_of_Ultron_poster.jpg', 'Hahakaka', 'hahakaka', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem aspernatur, voluptatem rerum sit tempore sunt aliquam praesentium officiis recusandae quas alias consectetur voluptate expedita in ipsum quia! Cumque, libero voluptas.', 35, 'wali', 1),
(2, 'FC-Register.drawio.png', 'Jmaaa', 'jmaaa', 'mkjenvak', 37, 'dapit', 2),
(6, 'Avengers_Infinity_War.jpg', 'kai', 'kai', 'kaikaikia', 34, 'dapit', 2),
(7, 'acer.jpeg', 'Acer', 'acer', 'awewdawi awifawifmfi seufirugj skrgn sugrs,gjsr isug,siguj gis,ejosj fsygyfsbfhjef iughsk gbskhbf skefb skjefb ekbfh wfjb ajkfekasjef ajefn jknf sk', 26, 'dapit', 4),
(11, 'DFD-1.drawio.png', 'Dfd', 'dfd', 'dfdfdfdfdfd', 6, 'dapit', 11),
(12, 'ERD.drawio.png', 'Erd', 'erd', 'erderederedered', 7, 'dapit', 2),
(13, 'FC-Crud.drawio.png', 'Crud', 'crud', 'cascsacadfaew', 3, 'dapit', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id_category` int(3) NOT NULL,
  `name_category` varchar(30) NOT NULL,
  `slug_category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`, `slug_category`) VALUES
(1, 'Political', 'political'),
(2, 'Food', 'food'),
(4, 'Traffic', 'traffic'),
(5, 'Sience', 'sience'),
(6, 'National', 'national'),
(7, 'International', 'international'),
(8, 'Finance', 'finance'),
(9, 'Sports', 'sports'),
(10, 'Technology', 'technology'),
(11, 'Automotive', 'automotive'),
(12, 'Entertaiment', 'entertaiment'),
(13, 'Lifestyle', 'lifestyle');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reports`
--

CREATE TABLE `reports` (
  `id_report` int(3) NOT NULL,
  `title_report` varchar(40) NOT NULL,
  `category_report` varchar(30) NOT NULL,
  `review_report` int(10) NOT NULL,
  `id_article` int(3) NOT NULL,
  `id_category` int(3) NOT NULL,
  `id_review` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int(3) NOT NULL,
  `user_review` varchar(40) NOT NULL,
  `review_article` int(10) NOT NULL,
  `id_article` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id_review`, `user_review`, `review_article`, `id_article`) VALUES
(1, 'brian', 1, 2),
(2, 'brian', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `level` enum('Admin','User','Journalist') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `level`) VALUES
(1, 'wali', '12344321', 'wali@gmail', 'Admin'),
(2, 'brian', '123321', '123321', 'User'),
(4, 'dapit', '123', 'dapits@gmail.com', 'User'),
(7, 'dapit', '1221', '1221', 'Journalist');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id_report`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `reports`
--
ALTER TABLE `reports`
  MODIFY `id_report` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
