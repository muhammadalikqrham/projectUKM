<div class="row">

  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Wisata</h1>
    <hr>
    <a href="<?= BASEURL ?>wisata" class="mb-5 btn btn-primary"">
      <i class=" fa fa-arrow-left"></i> Back
    </a>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Wisata</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>wisata/editWisata" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Judul Wisata</label>
            <input type="hidden" name="id" value="<?= $data['wisata']['id_wisata'] ?>">
            <input type="text" name="nama" class="form-control" required aria-describedby="Judul Berita" placeholder="Masukkan nama Wisata" value="<?= $data['wisata']['nama'] ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kategori Wisata</label>
            <select name="kategori" class="form-control">
              <?php foreach ($data['kategori_wisata'] as $row) : ?>
                <option value="<?= $row['id_kategori_wisata'] ?>" <?= ($row['id_kategori_wisata'] == $data['wisata']['id_kategori_wisata'] ? 'selected' : '') ?>><?= $row['nama_kategori_wisata'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label><br>
            <input type="hidden" name="gambar" value="<?= $data['wisata']['gambar'] ?>" readonly>
            <img src="<?= BASEURL ?>image/wisata/a<?= $data['wisata']['gambar'] ?>" alt="" width="256">
          </div>
          <div class="form-group">
            <label for="gambar">Upload Gambar</label>
            <input type="file" name="gambar" class="form-control-file" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Konten wisata</label>
            <textarea name="konten" id="editor1"><?= $data['wisata']['deskripsi'] ?></textarea>
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
  var editor = CKEDITOR.replace('editor1');
  CKFinder.setupCKEditor(editor);
</script>