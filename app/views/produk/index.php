  <!-- banner -->

  <!-- konten profil web -->
  <div class="container">
    <div class="d-flex justify-content-between align-items-center py-2">
      <h1 class="judul-header pt-4">Produk</h1>
    </div>
    <div class="col-12 pb-5">
      <div class="card card-tambahan">
        <div class="card-body">
          <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><b>Katalog Produk</b></li>
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
          <?php
          foreach ($data[1] as $item) :
          ?>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <a href="<?= BASEURL ?>produk/kategori/<?= urlencode($item['nama_kategori_produk']) ?>" class="fw-bold"><?= ucwords($item['nama_kategori_produk']) ?></a>
              </div>
            </li>
          <?php
          endforeach;
          ?>
        </ul>
      </div>
      <div class="col-lg-9 col-md-8 col-sm-6">
        <!-- Produk Baris 1 -->
        <div class="row row-cols-1 row-cols-md-1 g-4">
          <!-- Card Produk 1 -->

          <?php
          foreach ($data[0] as $item) :
          ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
              <a href="#" id="<?= $item['id_produk'] ?>" style="text-decoration: none; color: #4d4d4d" data-bs-toggle="modal" data-bs-target="#modal_tengah<?= $item['id_produk'] ?>" onclick="getId(this)">
                <div class="card card-tambahan mb-5" style="width: 100%;">
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
                </div>
              </a>
            </div>
          <?php endforeach; ?>
          <!-- modal -->
          <div class="modal fade" id="modal_tengah">
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
                        <table style="color:black; font-weight:bold;">
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
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td id="deskripsi"></td>
                          </tr>
                        </table>
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
          <!-- end modal -->
          <!-- End of Card Produk  4-->
        </div>
        <!-- Akhir Produk Baris 2 -->
      </div>
    </div>
  </div>
  <!-- End of Konten Produk -->


  <!-- pagination -->
  <div class="d-flex justify-content-center py-5">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li></li>
        <li class="page-item">
          <a class="page-link" style="padding-right: 17px;" href="<?= BASEURL ?>produk/<?= ($data[4] - 1 <= 0) ? '1' : $data[4] - 1 ?>">
            <svg width="15" style="margin-bottom: 4px;" height="25" viewBox="0 0 20 29" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path id="left-arrow" d="M0.965069 16.5189C-0.321689 15.4947 -0.32169 13.5053 0.965068 12.4811L15.963 0.543977C17.6057 -0.763512 20 0.433829 20 2.56283V26.4372C20 28.5662 17.6057 29.7635 15.963 28.456L0.965069 16.5189Z" fill="" />
            </svg>
          </a>
        </li>
        <?php
        for ($i = 0; $i < $data[3]; $i++) :
        ?>
          <li class="page-item<?= $i + 1 == $data[4] ? ' active' : '' ?>"><a class="page-link" href="<?= BASEURL ?>produk/<?= $i + 1 ?>"><?= $i + 1 ?></a></li>
        <?php endfor; ?>
        <li class="page-item"><a class="page-link" style="padding-left: 17px ;" href="<?= BASEURL ?>produk/<?= ($data[4] + 1 > $data[3]) ? $data[3] : $data[4] + 1 ?>">
            <svg width="15" height="25" style="margin-bottom: 4px;" viewBox="0 0 20 29" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path id="right-arrow" d="M19.0349 12.4811C20.3217 13.5053 20.3217 15.4947 19.0349 16.5189L4.03701 28.456C2.39427 29.7635 3.79266e-08 28.5662 2.2405e-07 26.4372L2.31121e-06 2.56283C2.49733e-06 0.433827 2.39427 -0.763517 4.03701 0.543973L19.0349 12.4811Z" fill="" />
            </svg></a></li>
        <li></li>
      </ul>
    </nav>
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