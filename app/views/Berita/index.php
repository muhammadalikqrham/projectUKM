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
<!-- container -->
<div class="container">
  <div class="d-flex justify-content-between align-items-center py-5">
    <h1 class="judul-header">Berita Terbaru</h1>
  </div>

  <!-- card-berita -->
  <div class="card mb-5 card-tambahan" style="max-width: 100%;">
    <div class="row g-0">
      <div class="col-md-4 col-xl-6">
        <img src="<?= BASEURL ?>admin/image/berita/a<?= $data[1]['gambar'] ?>" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8 col-xl-6">
        <div class="card-body">
          <h5 class="card-title"><?= $data[1]['judul'] ?></h5>
          <p class="card-text"><?= (strlen($data[1]['konten']) > 500) ? substr($data[1]['konten'], 0, 500) . '...' : $data[1]['konten'] ?></p>
          <a href="<?= BASEURL ?>berita/page/<?= $data[1]['id_berita'] ?>" class="btn btn-hubungi-penjual btn-sm">Baca Selengkapnya</a>
        </div>
      </div>
    </div>
  </div>

  <!-- linimasa -->
  <div class="d-flex justify-content-between align-items-center">
    <h1 class="judul-header">Lini masa</h1>
  </div>
  <div class="card card-tambahan">
    <div class="card-body">
      <?php
      foreach ($data[0] as $item) :
      ?>
        <div class="card mb-3" style="max-width: 100%; border: 0;">
          <a href="<?= BASEURL ?>berita/page/<?= $item['id_berita'] ?>">
            <div class="row g-0">
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $item['judul'] ?></h5>
                  <p class="card-text"><?= (strlen($item['konten']) > 150) ? substr($item['konten'], 0, 150) . '...' : $item['konten'] ?></p>
                  <p class="card-text"><small class="text-muted"><?= waktuTerbit($item['tanggal_upload']) ?></small></p>
                  <span class="btn btn-primary btn-sm badge-desain" style="background-color: <?= $item['warna_background'] ?>; color:<?= $item['warna_text'] ?>;"><?= $item['kategori_berita'] ?></span>
                </div>
              </div>
              <div class="col-md-4">
                <img src="<?= BASEURL ?>admin/image/berita/a<?= $item['gambar'] ?>" class="img-fluid rounded-start" alt="...">
              </div>
            </div>
          </a>
        </div>
        <hr>
      <?php
      endforeach;
      ?>

    </div>
  </div>
</div>
</div>
<!-- container -->