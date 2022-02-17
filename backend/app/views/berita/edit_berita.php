<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Berita</h1>
    <hr>
    <a href="<?= BASEURL ?>berita" class="mb-5 btn btn-primary"">
      <i class=" fa fa-arrow-left"></i> Back
    </a>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Berita</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>berita/editBerita" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="judul">Judul Berita</label>
            <input type="hidden" value="<?= $data[0]['id_berita'] ?>" name="id_berita" readonly>
            <input type="text" name="judul" id="judul" class="form-control" required aria-describedby="Judul Berita" placeholder="Masukkan Judul Berita" value="<?= $data[0]['judul'] ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kategori Berita</label>
            <select name="kategori" class="form-control">
              <?php foreach ($data[1] as $row) : ?>
                <option value="<?= $row['id_kategori_berita'] ?>" <?= $data[0]['kategori_berita'] == $row['kategori_berita'] ? 'selected' : '' ?>><?= $row['kategori_berita'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label><br>
            <input type="hidden" name="gambar" value="<?= $data[0]['gambar'] ?>" readonly>
            <img src="<?= BASEURL ?>image/berita/a<?= $data[0]['gambar'] ?>" alt="" width="256">
          </div>
          <div class="form-group">
            <label for="gambar">Upload Gambar Baru</label>
            <input type="file" name="gambar" class="form-control-file">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Konten Berita</label>
            <textarea name="konten" id="editor1"><?= $data[0]['konten'] ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  // Replace the <textarea id="editor1"> with a CKEditor 4
  // instance, using default configuration.
  CKEDITOR.replace('editor1');
</script>