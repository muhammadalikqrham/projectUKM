<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">berita</h1>
    <hr>
    <a href="<?= BASEURL ?>berita/kategori" class="mb-5 btn btn-primary"">
      <i class=" fa fa-arrow-left"></i> Back
    </a>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Kategori Berita</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>berita/editKategoriBerita" method="POST">
          <div class="form-group">
            <label for="kategori">Kategori Berita</label>
            <input type="hidden" name="id" value="<?= $data['id_kategori_berita'] ?>">
            <input type="text" name="kategori" id="kategori" class="form-control" aria-describedby="Judul Berita" placeholder="Masukkan Kategori Berita" value="<?= $data['kategori_berita'] ?>">
          </div>
          <div class="form-group">
            <label for="color1">Pilih Warna Text</label>
            <input type="color" id="warnaText" value="<?= $data['warna_text'] ?>" onchange="changeColorText()" name="warnaText">
          </div>
          <div class="form-group">
            <label for="color1">Pilih Warna Background</label>
            <input type="color" id="warnaBackground" value="<?= $data['warna_background'] ?>" name="warnaBackground" onchange="changeColorBackground()">
          </div>
          <div class="form-group">
            <label for="color1">Contoh : </label>
            <span id="contoh" class="badge-budaya px-4 py-1" style="font-weight: bold;">Kategori</span>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    document.getElementById('contoh').style.color = document.getElementById('warnaText').value;
    document.getElementById('contoh').style.backgroundColor = document.getElementById('warnaBackground').value;
  })

  function changeColorText() {
    let color = document.getElementById('warnaText').value;
    document.getElementById('contoh').style.color = color;
  }

  function changeColorBackground() {
    let color = document.getElementById('warnaBackground').value;
    document.getElementById('contoh').style.backgroundColor = color;
  }
</script>