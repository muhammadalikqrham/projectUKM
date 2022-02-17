<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['title'] ?></title>
  <!-- bs -->
  <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/bootstrap.css">
  <!-- owlcarousel -->
  <link rel="stylesheet" href="<?= BASEURL; ?>assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>assets/owlcarousel/assets/owl.theme.default.min.css">
  <!-- custom style -->
  <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/style.css">
  <!-- cdn font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sonsie+One&display=swap" rel="stylesheet">
  <!-- Font-Awesome -->
  <link rel="stylesheet" href="<?= BASEURL ?>assets/fontawesome/css/all.css">
  <!-- favicon -->
  <link rel="icon" href="<?= BASEURL ?>assets/image/icon/favicon.png" type="image/png" sizes="16x16">
  <!-- lightbox -->
  <link rel="stylesheet" href="<?= BASEURL ?>assets/css/magnific-popup.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">



</head>

<body>
  <!-- navbar -->
  <!-- Nav Baru -->
  <nav class="navbar navbar-expand-lg navbar-light nav-2">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img class="nav-logo" src="<?= BASEURL; ?>assets/image/icon/Lambang_Kab.png">
      </a>
      <span class="text-white nav-text brand-text">mudakreatif.com</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?= $data['page'] == 'Beranda' ? 'active' : '' ?>" aria-current="page" href="<?= BASEURL ?>beranda">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link <?= $data['page'] == 'Profil' ? 'active' : '' ?>" href="<?= BASEURL ?>profil" role="button" id="navbarDropdownProfil" data-bs-toggle="dropdown" aria-expanded="false">
              Profil
              <span class="dropdown-toggle"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownGallery">
              <?php foreach ($data['profil'] as $item) : ?>
                <li><a class="dropdown-item" href="<?= BASEURL . 'profil/page/' . urlencode($item['Kategori']) ?>"><?= $item['Kategori'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $data['page'] == 'Produk' ? 'active' : '' ?>" href="<?= BASEURL ?>produk">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $data['page'] == 'Berita' ? 'active' : '' ?>" href="<?= BASEURL ?>berita">Berita</a>

          </li>
          <li class="nav-item dropdown">
            <a class="nav-link <?= $data['page'] == 'Gallery' ? 'active' : '' ?>" href="<?= BASEURL ?>gallery" role="button" id="navbarDropdownGallery" data-bs-toggle="dropdown" aria-expanded="false">
              Gallery
              <span class="dropdown-toggle"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownGallery">
              <?php foreach ($data['kategori_gallery'] as $item) : ?>
                <li><a class="dropdown-item" href="<?= BASEURL . 'gallery/kategori/' . urlencode($item['nama_kategori_gallery']) ?>"><?= $item['nama_kategori_gallery'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link <?= $data['page'] == 'Fasilitas' ? 'active' : '' ?>" href="" role="button" id="navbarDropdownFasilitas" data-bs-toggle="dropdown" aria-expanded="false">
              Fasilitas
              <span class=" dropdown-toggle"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownFasilitas">
              <?php foreach ($data['fasilitas'] as $item) : ?>
                <li><a class="dropdown-item" href="<?= BASEURL . 'fasilitas/page/' . urlencode($item['nama_fasilitas']) ?>"><?= $item['nama_fasilitas'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link <?= $data['page'] == 'Event' ? 'active' : '' ?>" href="" role="button" id="navbarDropdownEvent" data-bs-toggle="dropdown" aria-expanded="false">
              Event
              <span class="dropdown-toggle"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownEvent">
              <?php foreach ($data['event'] as $item) : ?>
                <li><a class="dropdown-item" href="<?= BASEURL . 'event/page/' . urlencode($item['nama_event']) ?>"><?= $item['nama_event'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link <?= $data['page'] == 'Wisata' ? 'active' : '' ?>" href="" role="button" id="navbarDropdownWisata" data-bs-toggle="dropdown" aria-expanded="false">
              Wisata
              <span class="dropdown-toggle"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdownWisata">
              <?php foreach ($data['wisata'] as $item) : ?>
                <li><a class="dropdown-item" href="<?= BASEURL . 'wisata/page/' . urlencode($item['nama']) ?>"><?= $item['nama'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link " href="#">Wisata</a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link text-white" href="#">Profil Desa</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>
  <!-- End of Nav Baru -->