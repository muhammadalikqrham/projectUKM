<?php
function waktuTerbit($tanggal)
{
  date_default_timezone_set("Asia/Singapore");
  $waktu_awal = strtotime($tanggal);
  $waktu_sekarang = strtotime(date("Y-m-d h:i:s"));

  $selisihdtk = $waktu_sekarang - $waktu_awal;

  $selisihJam = floor($selisihdtk / (60 * 60));
  $selisihMenit = floor($selisihdtk / 60);
  $selisihHari = floor($selisihJam / 24);
  $selisihMinggu = floor($selisihHari / 7);
  $selisihBulan = floor($selisihMinggu / 4);
  $selisihTahun = floor($selisihBulan / 12);
  // echo number_format($selisihjam, 0, ",", ".");

  if ($selisihdtk < 60) {
    $tanggal = number_format($selisihdtk, 0, ",", ".") . " detik yang lalu.";
  } else if ($selisihMenit < 60) {
    $tanggal = $selisihMenit . " menit yang lalu.";
  } else if ($selisihJam < 60) {
    $tanggal = $selisihJam . " Jam yang lalu.";
  } else if ($selisihHari < 7) {
    $tanggal = $selisihHari . " Hari yang lalu.";
  } else if ($selisihMinggu < 4) {
    $tanggal = $selisihMinggu . " Minggu yang lalu.";
  } else if ($selisihBulan < 12) {
    $tanggal = $selisihBulan . " Bulan yang lalu.";
  } else if ($selisihBulan > 12) {
    $tanggal = $selisihTahun . " Tahun yang lalu.";
  }

  return $tanggal;
}
?>
<div class="container">

  <!-- linimasa -->
  <!-- <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb pt-5">
      <li class="breadcrumb-item"><a href="#">Beranda</a></li>
      <li class="breadcrumb-item active" aria-current="page">Berita</li>
      <li class="breadcrumb-item active" aria-current="page">Kuliner</li>
    </ol>
  </nav> -->
  <div class="col-12 pt-2 pb-5">
    <div class="card card-tambahan mt-3 shadow">
      <div class="card-body">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASEURL ?>beranda">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= BASEURL ?>berita">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page"><b><?= $data[0]['judul'] ?></b></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
      <div class="card card-tambahan shadow">
        <div class="card-body">
          <h2><?= $data[0]['judul'] ?></h2>
          <span class="text-muted">Samar Indah | <?= date('D, d F Y H:i', strtotime($data[0]['tanggal_upload']))  ?></span>
          <img src="<?= BASEURL ?>admin/image/berita/a<?= $data[0]['gambar'] ?>" class="img-fluid py-2"><br>
          <!-- <span class="text-muted">Source Instagram</span><br> -->
          <p><?= $data[0]['konten'] ?></p>
          <p class="fw-bold">Penulis : <?= $data[0]['penulis'] ?></p>
          <p class="fw-bold">Kategori : <span class="btn btn-primary btn-sm badge-budaya " style="background-color: <?= $data[0]['warna_background'] ?>; color:<?= $data[0]['warna_text'] ?>;"><?= $data[0]['kategori_berita'] ?></span></p>
        </div>
      </div>
    </div>
    <!-- <div class="col-4">
      <h4>Iklan</h4>
    </div> -->
  </div>

  <div class="d-flex justify-content-between align-items-center py-5">
    <h1>Berita Lainya</h1>
  </div>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="owl-carousel">
      <!-- start loop -->
      <?php foreach ($data[1] as $item) : ?>
        <a href="<?= BASEURL ?>berita/page/<?= $item['id_berita'] ?>">
          <div class="card card-tambahan mb-3" style="width: 100%; min-height: 300px;">
            <img src="<?= BASEURL ?>admin/image/berita/a<?= $item['gambar'] ?>" class="card-img-top" height="130" alt="...">
            <div class="card-body">
              <p class="card-text"><?= (strlen($item['judul']) > 83) ? substr($item['judul'], 0, 80) . '...' : substr($item['judul'], 0, 80) ?></p>
            </div>
            <div class="card-footer">
              <small class="text-muted"><?= waktuTerbit($item['tanggal_upload']) ?></small>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
      <!-- end loop -->
    </div>
  </div>
</div>