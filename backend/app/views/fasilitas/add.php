<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Fasilitas</h1>
    <hr>
    <a href="<?= BASEURL ?>fasilitas" class="mb-5 btn btn-primary"">
      <i class=" fa fa-arrow-left"></i> Back
    </a>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Fasilitas</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>fasilitas/postFasilitas" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Fasiilitas</label>
            <input type="text" name="nama" class="form-control" required aria-describedby="Judul Berita" placeholder="Masukkan nama Fasilitas">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kategori Fasilitas</label>
            <select name="kategori" class="form-control">
              <?php foreach ($data as $row) : ?>
                <option value="<?= $row['id_kategori_fasilitas'] ?>"><?= $row['nama_kategori_fasilitas'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="gambar">Upload Gambar</label>
            <input type="file" name="gambar" class="form-control-file" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Konten Fasilitas</label>
            <textarea name="konten" id="editor1"></textarea>
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