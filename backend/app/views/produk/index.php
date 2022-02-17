<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Produk</h1>
    <hr>

    <a href="<?= BASEURL ?>produk/add" class="mb-5 btn btn-primary"">
      <i class=" fa fa-plus-circle"></i> Tambah Produk
    </a>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
      </div>
      <?php Flasher::flash() ?>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" width="5%">No</th>
                <th class="text-center" width="20%">Produk</th>
                <th class="text-center" width="10%">Harga</th>
                <th class="text-center" width="10%">Penjual</th>
                <th class="text-center" width="10%">Kategori</th>
                <th class="text-center" width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data as $row) :
              ?>
                <tr>
                  <td class="text-center"><?= $no ?></td>
                  <td id="nama<?= $row['id_produk'] ?>" class=""><?= $row['nama_produk'] ?></td>
                  <td id="harga<?= $row['id_produk'] ?>" class="text-center"><?= "Rp. " . number_format((int)$row['harga_produk'], 0, ',', '.')  ?></td>
                  <td id="penjual<?= $row['id_produk'] ?>" class=""><?= $row['penjual'] ?></td>
                  <td class="" id="kategori<?= $row['id_produk'] ?>"><?= $row['nama_kategori_produk'] ?></td>
                  <td class="text-center">
                    <button class="btn btn-info btn-circle" data-target="#modalDetail<?= $row['id_produk'] ?>" id="<?= $row['id_produk'] ?>" data-toggle="modal" onclick="getId(this)">
                      <i class="fas fa-info-circle"></i>
                    </button>
                    <a href="<?= BASEURL ?>produk/edit/<?= $row['id_produk'] ?>" class="btn btn-success btn-circle float-center">
                      <i class="fas fa-edit"></i></a>
                      <?php if(isset($_SESSION['role'])) : ?>
                        <?php if ($_SESSION['role'] == 'Super Admin') :?>
                    <a href="<?= BASEURL ?>produk/hapus/<?= $row['id_produk'] ?>" class="btn btn-danger btn-circle float-center" onclick="return confirm('Yakin ingin menghapus data ini ?')"><i class="fas fa-trash" "></i></a>
                    <?php endif;?>
                    <?php endif;?>
                        <input type="hidden" id="dimensi<?= $row['id_produk'] ?>" value="<?= $row['dimensi'] ?>">
                        <input type="hidden" id="deskripsi<?= $row['id_produk'] ?>" value="<?= $row['deskripsi'] ?>">
                        <input type="hidden" id="gambar<?= $row['id_produk'] ?>" value="<?= $row['gambar'] ?>">
                  </td>
                </tr>
                <?php $no++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
<div class=" modal fade" id="modalDetail" tabindex="-1" aria-labelledby="tampilBannerModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mr-auto" id="tittle">Detail Produk</h5>
        <button type="button" class="ml-2 btn btn-secondary" data-dismiss="modal" aria-label="Close">
          Tutup
        </button>
      </div>
      <div class="modal-body">
        <img src="" id="gambarModal" class="card-img-top mb-2" alt="">
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
            <td id="deskripsi_produk"></td>
          </tr>
        </table>
      </div>
      <!-- <div class="modal-footer">
                      </div> -->
    </div>
  </div>
</div>
<script>
  function getId(btn) {
    document.querySelector("div.modal.fade").id = "modalDetail" + btn.id;
    document.getElementById("gambarModal").src = 'http://localhost/samarindah/admin/image/produk/a' + document.getElementById('gambar' + btn.id).value;
    document.getElementById("kategori").innerHTML = document.getElementById("kategori" + btn.id).innerHTML;
    document.getElementById("penjual").innerHTML = document.getElementById("penjual" + btn.id).innerHTML;
    document.getElementById("tittle").innerHTML = document.getElementById("nama" + btn.id).innerHTML;
    document.getElementById("deskripsi_produk").innerHTML = document.getElementById("deskripsi" + btn.id).value;
    document.getElementById("dimensi").innerHTML = document.getElementById("dimensi" + btn.id).value;
    document.getElementById("harga").innerHTML = document.getElementById("harga" + btn.id).innerHTML;
    // console.log(document.getElementById("deskripsi"+btn.id).value)
    // document.getElementById('id').value = btn.id;
    // const x = document.getElementById('status' + btn.id).value;
    // if (x == 'unpublished') {
    //   // console.log(true);
    //   document.getElementById("btn-publish").innerHTML = "Publish";
    //   document.getElementById("btn-publish").name = "Published";
    //   document.getElementById("btn-publish").classList.remove('btn-danger')
    //   document.getElementById("btn-publish").classList.add("btn-primary");
    // } else {
    //   document.getElementById("btn-publish").innerHTML = "Take Down";
    //   document.getElementById("btn-publish").name = "Takedown";
    //   document.getElementById("btn-publish").classList.remove('btn-primary')
    //   document.getElementById("btn-publish").classList.add("btn-danger");
    // }

  }

  // function publish(btn) {
  //   const x = document.getElementById("btn-publish").name;
  //   console.log(document.getElementById("publish").onsubmit = confirm('Anda yakin ingin ' + x + ' banner ini ?'));
  // }
</script>