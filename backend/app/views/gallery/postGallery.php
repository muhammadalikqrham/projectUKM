<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gallery</h1>
    <hr>
    <a href="<?= BASEURL ?>gallery" class="mb-5 btn btn-primary"">
      <i class=" fa fa-arrow-left"></i> Back
    </a>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Posting Gallery</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>gallery/postGallery" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Caption</label>
            <input type="text" name="deskripsi" class="form-control" required aria-describedby="Caption" placeholder="Masukkan Caption">
          </div>
          <div class="form-group">
            <label for="kategori">Kategori Gallery</label>
            <select name="kategori" id="kategori" class="form-control">
              <?php foreach ($data as $item) : ?>
                <option value="<?= $item['id_kategori_gallery'] ?>"><?= $item['nama_kategori_gallery'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="banner">Upload Gambar</label>
            <input type="file" name="gambar" class="form-control-file" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>