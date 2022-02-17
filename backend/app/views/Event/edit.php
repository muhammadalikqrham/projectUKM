<div class="row">

  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Event</h1>
    <hr>
    <a href="<?= BASEURL ?>event" class="mb-5 btn btn-primary"">
      <i class=" fa fa-arrow-left"></i> Back
    </a>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Event</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>event/editEvent" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Event</label>
            <input type="hidden" name="id" value="<?= $data['event']['id_event'] ?>">
            <input type="text" name="nama" class="form-control" required aria-describedby="Judul Berita" placeholder="Masukkan nama event" value="<?= $data['event']['nama_event'] ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kategori Event</label>
            <select name="kategori" class="form-control">
              <?php foreach ($data['kategori_event'] as $row) : ?>
                <option value="<?= $row['id_kategori_event'] ?>" <?= ($row['id_kategori_event'] == $data['event']['id_kategori_event'] ? 'selected' : '') ?>><?= $row['nama_kategori_event'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label><br>
            <input type="hidden" name="gambar" value="<?= $data['event']['gambar'] ?>" readonly>
            <img src="<?= BASEURL ?>image/event/a<?= $data['event']['gambar'] ?>" alt="" width="256">
          </div>
          <div class="form-group">
            <label for="gambar">Upload Gambar</label>
            <input type="file" name="gambar" class="form-control-file">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Konten Event</label>
            <textarea name="konten" id="editor1"><?= $data['event']['deskripsi'] ?></textarea>
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