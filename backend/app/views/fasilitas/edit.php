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
        <h6 class="m-0 font-weight-bold text-primary">Ubah Fasilitas</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>fasilitas/editFasilitas" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Fasilitas</label>
            <input type="hidden" name="id" value="<?= $data['fasilitas']['id_fasilitas'] ?>">
            <input type="text" name="nama" class="form-control" required aria-describedby="Judul Berita" placeholder="Masukkan nama Fasilitas" value="<?= $data['fasilitas']['nama_fasilitas'] ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kategori Fasilitas</label>
            <select name="kategori" class="form-control">
              <?php foreach ($data['kategori_fasilitas'] as $row) : ?>
                <option value="<?= $row['id_kategori_fasilitas'] ?>" <?= ($row['id_kategori_fasilitas'] == $data['fasilitas']['id_kategori_fasilitas'] ? 'selected' : '') ?>><?= $row['nama_kategori_fasilitas'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label><br>
            <input type="hidden" name="gambar" value="<?= $data['fasilitas']['gambar'] ?>" readonly>
            <img src="<?= BASEURL ?>image/fasilitas/a<?= $data['fasilitas']['gambar'] ?>" alt="" width="256">
          </div>
          <div class="form-group">
            <label for="gambar">Upload Gambar</label>
            <input type="file" name="gambar" class="form-control-file">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Konten Fasilitas</label>
            <textarea name="konten" id="editor1"><?= $data['fasilitas']['deskripsi'] ?></textarea>
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