<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Wisata</h1>
    <hr>
    <a href="<?= BASEURL ?>wisata/kategori" class="mb-5 btn btn-primary"">
      <i class=" fa fa-arrow-left"></i> Back
    </a>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori Wisata</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>wisata/addKategoriWisata" method="POST">
          <div class="form-group">
            <label for="kategori">Kategori Wisata</label>
            <input type="text" name="kategori" id="kategori" class="form-control" aria-describedby="Judul Berita" placeholder="Masukkan Kategori Wisata">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>