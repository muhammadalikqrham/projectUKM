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
<!-- slider -->


<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php
    $i = 0;
    foreach ($data[0] as $item) :
      $i++;
    ?>

      <div class="carousel-item <?= ($i === 1) ? 'active' : '' ?>">
        <img src="<?= BASEURL ?>admin/image/banner/a<?= $item['gambar'] ?>" class="d-block w-100 slider-size" height="768" alt="...">
      </div>
    <?php
    endforeach;
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- konten profil web -->


<!-- end of content-header -->
<!-- header -->
<!-- isi container -->
<div class="container">
  <div class="row justify-content-center row-spacing  mb-5">
    <div class="col-12">
      <h2 class="text-center judul-header" style="word-wrap: break-word;">Profil UKM Muda Kreatif</h2>
    </div>
  </div>
  <!-- tutup row profil desa -->
  <!-- row isi profil desa -->
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
      <img class="card-img-top mx-auto d-block" src="<?= BASEURL ?>/admin/image/profil/a<?= $data[1]['gambar'] ?>" alt="">
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
      <div class="mt-0 text-profil">
        <?= $data[1]["Keterangan"] ?>
      </div>
      <a class="btn btn-hubungi-penjual" href="<?= BASEURL ?>/profil/page/Profil">Baca Selengkapnya &nbsp;<i class="fas fa-chevron-right"></i></a>
    </div>
  </div>
  <!-- end of profil desa -->
  <!-- end of header -->

  <!-- agenda desa -->
  <div class="row justify-content-center row-spacing  mb-5">
    <div class="col-12">
    </div>
  </div>
  <!-- produk -->
  <div class="d-flex justify-content-between align-items-center">
    <h2 class="judul-header pt-5 mb-4">Produk Terbaru</h2>
    <!-- <a href="#" class="text-small">Lihat Semua Produk</a> -->
  </div>
  <!-- Card Produk -->


  <div class="row row-cols-1 row-cols-md-4 g-5">
    <div class="owl-carousel">
      <?php
      foreach ($data[2] as $item) :
      ?>
        <div class="card card-tambahan mb-5" style="width: 100%;">
          <a href="#" id="<?= $item['id_produk'] ?>" style="text-decoration: none; color: #4d4d4d" data-bs-toggle="modal" data-bs-target="#modal_tengah<?= $item['id_produk'] ?>" onclick="getId(this)">
            <img id="gambar<?= $item['id_produk'] ?>" src="<?= BASEURL ?>admin/image/produk/a<?= $item['gambar'] ?>" class="card-img-top item" height="154">
            <div class="card-body">
              <p class="card-text" id="judul<?= $item['id_produk'] ?>"><?= $item['nama_produk'] ?></p>
              <ul class="list-unstyled my-2">
                <li>
                  <div class="d-flex">
                    <img src="<?= BASEURL ?>assets/image/img/icon/Union.svg" style="width: 0.8rem;" alt="">
                    <p class="text-foot ms-2 mb-0" id="penjual<?= $item['id_produk'] ?>"><?= $item['penjual'] ?></p>
                    <p hidden id="deskripsi<?= $item['id_produk'] ?>"><?= $item['deskripsi'] ?></p>
                    <p hidden id="kategori<?= $item['id_produk'] ?>"><?= $item['nama_kategori_produk'] ?></p>
                    <p hidden id="dimensi<?= $item['id_produk'] ?>"><?= $item['dimensi'] ?></p>
                  </div>
                </li>
              </ul>

              <h4 class="harga pt-0" id="harga<?= $item['id_produk'] ?>">Rp <?= number_format((int)$item['harga_produk'], 0, ',', '.') ?></h4>
              <div class="py-2 d-flex justify-content-center">
                <a href="https://wa.me/<?= $item['no_hp'] ?>?text=Apakah Barang Tersedia?" class="btn btn-hubungi-penjual button btn-sm">Hubungi Penjual</a>
              </div>
            </div>
          </a>
        </div>
      <?php
      endforeach;
      ?>
    </div>

  </div>

  <!-- akhir produk -->

  <!-- berita -->
  <div class="d-flex justify-content-between align-items-center mt-5">
    <h2 class="judul-header mb-4">Berita Terbaru</h2>
    <!-- <a href="#">Lihat Semua Berita</a> -->
  </div>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="owl-carousel">

      <?php
      foreach ($data[3] as $item) :
      ?>
        <a href="<?= BASEURL ?>berita/page/<?= $item['id_berita'] ?>">
          <div class="card card-tambahan mb-3" style="width: 100%; min-height: 300px;">
            <img src="<?= BASEURL ?>admin/image/berita/a<?= $item['gambar'] ?>" class="card-img-top" height="130" alt="...">
            <div class="card-body">
              <p class="card-text"><?= (strlen($item['judul']) > 83) ? substr($item['judul'], 0, 80) . '...' : substr($item['judul'], 0, 80) ?></p>
            </div>
            <div class="card-footer">
              <small class="text-muted"> <?= waktuTerbit($item['tanggal_upload']) ?> </small>
            </div>
          </div>
        </a>
      <?php
      endforeach;
      ?>
    </div>
  </div>

  <!-- konten harus memilih aku -->
  <!-- <h1 class="font-weight-header space-alasan mt-5 pt-8 pb-5">
    Mengapa Harus Memilih Kami
  </h1>
  <div class="row text-center pb-5">
    <div class="col-md-4 col-sm-12">
      <img src="<?= BASEURL ?>assets/image/img/Group 53.svg" class="size-icon-alasan">
      <h4 class="pt-4 font-weight-alasan">
        Terjangkau
      </h4>
      <p class="fs-5 pb-3 mt-0 mb-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis dolore
      </p>
    </div>
    <div class="col-md-4 col-sm-12">
      <img src="<?= BASEURL ?>assets/image/img/Group 54.svg" class="size-icon-alasan">
      <h4 class="pt-4 font-weight-alasan">
        Kreatif
      </h4>
      <p class="fs-5 pb-3 mt-0 mb-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis dolore
      </p>
    </div>
    <div class="col-md-4 col-sm-12">
      <img src="<?= BASEURL ?>assets/image/img/Group 55.svg" class="size-icon-alasan">
      <h4 class="pt-4 font-weight-alasan">
        Beragam
      </h4>
      <p class="fs-5 pb-3 mt-0 mb-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis dolore
      </p>
    </div>
  </div> -->

  <!-- agenda -->
  <div class="row card-tambahan p-5">
    <h2 class="text-center judul-header mb-5">Agenda Kegiatan Desa</h2>
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
      <img class="card-img-top" src="<?= BASEURL ?>/admin/image/event/a<?= $data[8][0]['gambar'] ?>" alt="">
      <h4 class="mt-5"><?= $data[8][0]['nama_event'] ?></h4>
      <p class="">
        <?= strlen($data[8][0]["deskripsi"] > 103) ? substr($data[8][0]["deskripsi"], 0, 250) . '...' : $data[8][0]["deskripsi"] ?>
      </p>
      <a class="btn btn-hubungi-penjual btn-sm text-sm readmore" href="<?= BASEURL . 'event/page/' . urlencode($data[8][0]['nama_event']) ?>">Baca Selengkapnya &nbsp;<i class="fas fa-chevron-right"></i></a>

    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
      <!-- loop -->
      <?php foreach ($data[8] as $item) : ?>
        <?php if ($data[8][0]['nama_event'] == $item['nama_event']) :
          continue;
        endif; ?>
        <div class="row mb-3">
          <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-3">
            <img class="card-tambahan card-img-top text-center" src="<?= BASEURL ?>/admin/image/event/a<?= $item['gambar'] ?>" alt="">
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 mt-3">
            <h4><?= $item['nama_event'] ?></h4>
            <p> <?= strlen($item["deskripsi"] > 103) ? substr($item["deskripsi"], 0, 100) . '...' : $item["deskripsi"] ?></p>
            <a class="btn btn-hubungi-penjual btn-sm readmore me-auto" href="<?= BASEURL . 'event/page/' . urlencode($item['nama_event']) ?>">Baca Selengkapnya &nbsp;<i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- loop -->
    </div>
  </div>
  <!-- gallery -->
  <h1 class="text-center font-weight-header space-galeri mb-5">
    Galeri
  </h1>
  <div class="row">
    <!-- card -->
    <?php
    foreach ($data[4] as $item) :
    ?>
      <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mt-3">
        <a href="<?= BASEURL ?>admin/image/gallery/a<?= $item['gambar'] ?>" class="fancylight popup-btn" data-fancybox-group="light">
          <img src="<?= BASEURL ?>admin/image/gallery/a<?= $item['gambar'] ?>" class="card-img-top" width="264" height="175" alt="...">
        </a>
      </div>
    <?php
    endforeach; ?>
  </div>
</div>

<!-- modal -->
<div class="modal fade hehe" id="modal_tengah">
  <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
    <div class="modal-content">
      <!-- Ini adalah Bagian Header Modal -->
      <div class="modal-header">
        <h4 class="modal-title title_inside_card harga" id="judulModal"></h4>
        <a href="https://wa.me/08125487949?text=Apakah Barang Tersedia?"><button class="btn btn-hubungi-penjual">Hubungi Penjual</button></a>
        <!-- <button type="button" class="btn-close p-0" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <!-- Ini adalah Bagian Body Modal -->
      <div class="modal-body">
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <img src="" id="gambarModal" class="card-img-top mb-2" alt="">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <p id="nama_produk" class="h3"><strong></strong></p>
              <!-- <table style="color:black; font-weight:bold;">
                <tr>
                  <td>Penjual</td>
                  <td>:</td>
                  <td id="penjual"></td>
                </tr>
                <tr>
                  <td>Kategori</td>
                  <td>:</td>
                  <td id="kategori"></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>:</td>
                  <td id="harga"></td>
                </tr>
                <tr>
                  <td>Dimensi (CM)</td>
                  <td>:</td>
                  <td id="dimensi"></td>
                </tr>
                <tr>
                  <td vh="0">Deskripsi</td>
                  <td>:</td>
                  <td id="deskripsi"></td>
                </tr>
              </table> -->
              <div class="row mt-2">
                <div class="col-6 fw-bold">
                  Penjual
                </div>
                <div class="col-6" id="penjual">

                </div>
              </div>
              <div class="row mt-2">
                <div class="col-6 fw-bold">
                  kategori
                </div>
                <div class="col-6" id="kategori">

                </div>
              </div>
              <div class="row mt-2">
                <div class="col-6 fw-bold">
                  harga
                </div>
                <div class="col-6" id="harga">

                </div>
              </div>
              <div class="row mt-2">
                <div class="col-6 fw-bold">
                  dimensi
                </div>
                <div class="col-6" id="dimensi">

                </div>
              </div>
              <div class="row mt-2">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 fw-bold">
                  deskripsi
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" id="deskripsi">

                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
      <!-- Ini adalah Bagian Footer Modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-tutup-modal" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<script>
  function getId(btn) {
    document.querySelector("div.modal.fade").id = "modal_tengah" + btn.id;
    // console.log(document.getElementById('penjual').innerHTML + 'asd');
    document.getElementById("gambarModal").src = document.getElementById("gambar" + btn.id).src;
    document.getElementById('penjual').innerHTML = document.getElementById('penjual' + btn.id).innerHTML;
    document.getElementById('kategori').innerHTML = document.getElementById('kategori' + btn.id).innerHTML;
    document.getElementById('harga').innerHTML = document.getElementById('harga' + btn.id).innerHTML;
    document.getElementById('dimensi').innerHTML = document.getElementById('dimensi' + btn.id).innerHTML;
    document.getElementById('deskripsi').innerHTML = document.getElementById('deskripsi' + btn.id).innerHTML;
    document.getElementById("judulModal").innerHTML = document.getElementById("judul" + btn.id).innerHTML;
    // document.getElementById("deskripsiModal").innerHTML = document.getElementById("deskripsi" + btn.id).innerHTML;
    // document.getElementById("id").value = btn.id;
  }
</script>