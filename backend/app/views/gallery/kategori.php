<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gallery</h1>
    <hr>
    <button class="mb-5 btn btn-primary" data-toggle="modal" data-target="#modalKategori">
      <i class=" fa fa-plus-circle"></i> Tambah Kategori Gallery
    </button>
    <?php Flasher::flash() ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori Gallery</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <th>No</th>
              <th>Nama Kategori</th>
              <th width="10%">Aksi</th>
            </thead>
            <tbody>

              <?php
              $no = 0;
              foreach ($data as $item) : ?>
                <tr>
                  <td>
                    <?= ++$no ?>
                  </td>
                  <td id="kategori<?= $item['id_kategori_gallery'] ?>"><?= $item['nama_kategori_gallery'] ?></td>
                  <td align="center">
                    <button id="<?= $item['id_kategori_gallery'] ?>" data-toggle="modal" data-target="#modalUbahKategori" class="btn btn-success btn-sm" onclick="getId(this)"><i class=" fas fa-edit"></i></button>
                    <a href="<?= BASEURL ?>gallery/deleteKategory/<?= $item['id_kategori_gallery'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Danger : Menghapus data kategori akan menghapus seluruh gambar yang berhubungan dengan kategori tersebut !!')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
<!-- Modal Ubah -->
<div class="modal fade" id="modalUbahKategori" tabindex="-1" role="dialog" aria-labelledby="modalUbahKategori" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>gallery/editKategory" method="post">
          <div class="form-group">
            <label for="">
              <b>Nama Kategori</b>
            </label>
            <input type="hidden" name="id_kategori" id="id_kategori">
            <input id="nama_kategori" type="text" class="form-control" name="kategori">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end -->
<!-- Modal Tambah -->
<div class="modal fade" id="modalKategori" tabindex="-1" role="dialog" aria-labelledby="modalKategori" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>gallery/addKategory" method="post">
          <div class="form-group">
            <label for="">
              <b>Nama Kategori</b>
            </label>
            <input type="text" class="form-control" name="kategori">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function getId(btn) {
    document.getElementById("id_kategori").value = btn.id;
    document.getElementById("nama_kategori").value = document.getElementById("kategori" + btn.id).innerHTML;
  }
</script>