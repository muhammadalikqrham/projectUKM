<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Event</h1>
    <hr>
    <a href="<?= BASEURL ?>event/kategori" class="mb-5 btn btn-primary"">
      <i class=" fa fa-arrow-left"></i> Back
    </a>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Kategori Event</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>event/editKategoriEvent" method="POST">
          <div class="form-group">
            <label for="kategori">Kategori Event</label>
            <input type="hidden" name="id" value="<?= $data['id_kategori_event'] ?>">
            <input type="text" name="kategori" id="kategori" class="form-control" aria-describedby="Judul Berita" placeholder="Masukkan Kategori Fasilitas" value="<?= $data['nama_kategori_event'] ?>">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>