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
            <li class="breadcrumb-item"><a href="">Profil</a></li>
            <li class="breadcrumb-item active" aria-current="page"><b><?= $data[0]['Kategori'] ?></b></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
      <div class="card card-tambahan shadow">
        <div class="card-body">
          <h2><?= $data[0]['Kategori'] ?></h2>
          <span class="text-muted">Samar Indah </span>
          <?php if (!empty($data[0]['gambar'])) : ?>

            <img src="<?= BASEURL ?>admin/image/profil/a<?= $data[0]['gambar'] ?>" class="img-fluid py-2"><br>
          <?php endif; ?>
          <!-- <span class="text-muted">Source Instagram</span><br> -->
          <p><?= $data[0]['Keterangan'] ?></p>
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
        <a href="<?= BASEURL ?>berita/page/<?= urlencode($item['id_berita']) ?>">
          <div class="card card-tambahan mb-3" style="width: 100%; min-height: 300px;">
            <img src="<?= BASEURL ?>admin/image/berita/a<?= $item['gambar'] ?>" class="card-img-top" height="130" alt="...">
            <div class="card-body">
              <p class="card-text"><?= (strlen($item['judul']) > 83) ? substr($item['judul'], 0, 80) . '...' : substr($item['judul'], 0, 80) ?></p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Wisata Desa Jembayan Tengah</small>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
      <!-- end loop -->
    </div>
  </div>
</div>