<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profil</h1>
    <hr>
    <a href="<?= BASEURL ?>profil" class="mb-5 btn btn-primary"">
      <i class=" fa fa-arrow-left"></i> Back
    </a>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Profil</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>profil/editProfil" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" name="id" value="<?= $data['id_profil'] ?>">
            <label for="exampleInputEmail1">Judul</label>
            <input type="text" name="nama" class="form-control" required aria-describedby="Judul Berita" placeholder="Masukkan Kategori Profil" value="<?= $data['Kategori'] ?>">
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label><br>
            <input type="hidden" name="gambar" value="<?= $data['gambar'] ?>" readonly>
            <img src="<?= BASEURL ?>image/profil/a<?= $data['gambar'] ?>" alt="" width="256">
          </div>
          <div class="form-group">
            <label for="gambar">Upload Gambar</label>
            <input type="file" name="gambar" class="form-control-file">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Konten Profil</label>
            <textarea name="konten" id="editor1"><?= $data['Keterangan'] ?></textarea>
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