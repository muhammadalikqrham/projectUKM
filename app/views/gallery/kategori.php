  <!-- konten profil web -->
  <div class="container">
    <div class="d-flex justify-content-between align-items-center py-2">
      <h1 class="judul-header pt-4">Gallery</h1>
    </div>
    <div class="col-12 pb-5">
      <div class="card card-tambahan">
        <div class="card-body">
          <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="<?= BASEURL ?>beranda">Home</a></li>
              <li class="breadcrumb-item" aria-current="page"><a href="<?= BASEURL ?>gallery">Gallery</a></li>
              <li class="breadcrumb-item active" aria-current="page"><b><?= $data[3] ?></b></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <!-- konten produk terbaru -->

    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-6">
        <!-- <h4>Etalase Toko</h4> -->
        <ul class="list-group list-group-produk">
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <a href="#" class="h2 fw-bold">Kategori Gallery</a>
              <hr class="dropdown-divider">
            </div>
          </li>
          <?php
          foreach ($data[0]['kategori_gallery'] as $item) :
          ?>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <a href="<?= BASEURL ?>gallery/kategori/<?= urlencode($item['nama_kategori_gallery']) ?>" class="fw-bold"><?= ucwords($item['nama_kategori_gallery']) ?></a>
              </div>
            </li>
          <?php
          endforeach;
          ?>
        </ul>
      </div>
      <div class="col-lg-9 col-md-8 col-sm-6">
        <!-- Produk Baris 1 -->
        <div class="row row-cols-2 row-cols-md-4 g-4">
          <!-- card -->
          <?php
          if (empty($data[0]['gallery'])) {
            echo '<p>Tidak ada item di kategori ini</p>';
          } else {
            foreach ($data[0]['gallery'] as $item) :
          ?>
              <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mt-3">
                <a href="<?= BASEURL ?>admin/image/gallery/a<?= $item['gambar'] ?>" class="fancylight popup-btn" data-fancybox-group="light">
                  <img src="<?= BASEURL ?>admin/image/gallery/a<?= $item['gambar'] ?>" class="card-img-top" width="264" height="175" alt="...">
                </a>
              </div>
          <?php
            endforeach;
          } ?>
        </div>
      </div>
    </div>
  </div>
  <!-- End of Konten Produk -->


  <!-- pagination -->
  <?php if (!empty($data[0]['gallery'])) : ?>
    <div class="d-flex justify-content-center py-5">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li></li>
          <li class="page-item">
            <a class="page-link" style="padding-right: 17px;" href="<?= BASEURL ?>gallery/kategori/<?= ($data[2] - 1 <= 0) ? urlencode($data[3]) . '/1' : urlencode($data[3]) . '/' . $data[2] - 1 ?>">
              <svg width="15" style="margin-bottom: 4px;" height="25" viewBox="0 0 20 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path id="left-arrow" d="M0.965069 16.5189C-0.321689 15.4947 -0.32169 13.5053 0.965068 12.4811L15.963 0.543977C17.6057 -0.763512 20 0.433829 20 2.56283V26.4372C20 28.5662 17.6057 29.7635 15.963 28.456L0.965069 16.5189Z" fill="" />
              </svg>
            </a>
          </li>
          <?php
          for ($i = 0; $i < $data[1]; $i++) :
          ?>
            <li class="page-item<?= $i + 1 == $data[2] ? ' active' : '' ?>"><a class="page-link" href="<?= BASEURL ?>gallery/kategori/<?= urlencode($data[3]) . '/' . $i + 1 ?>"><?= $i + 1 ?></a></li>
          <?php endfor; ?>
          <li class="page-item"><a class="page-link" style="padding-left: 17px ;" href="<?= BASEURL ?>gallery/kategori/<?= ($data[2] + 1 > $data[1]) ? urlencode($data[3]) . '/' . $data[1] : urlencode($data[3]) . '/' . $data[2] + 1 ?>">
              <svg width="15" height="25" style="margin-bottom: 4px;" viewBox="0 0 20 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path id="right-arrow" d="M19.0349 12.4811C20.3217 13.5053 20.3217 15.4947 19.0349 16.5189L4.03701 28.456C2.39427 29.7635 3.79266e-08 28.5662 2.2405e-07 26.4372L2.31121e-06 2.56283C2.49733e-06 0.433827 2.39427 -0.763517 4.03701 0.543973L19.0349 12.4811Z" fill="" />
              </svg></a></li>
          <li></li>
        </ul>
      </nav>
    </div>
  <?php endif; ?>
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