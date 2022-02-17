<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Berita</h1>
    <hr>
    <a href="<?= BASEURL ?>berita/kategori" class="mb-5 btn btn-primary"">
      <i class=" fa fa-arrow-left"></i> Back
    </a>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Posting Berita</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>berita/addKategoriBerita" method="POST">
          <div class="form-group">
            <label for="kategori">Kategori Berita</label>
            <input type="text" name="kategori" id="kategori" class="form-control" aria-describedby="Judul Berita" placeholder="Masukkan Kategori Berita">
          </div>
          <div class="form-group">
            <label for="color1">Pilih Warna Text</label>
            <input type="color" id="warnaText" value="#e24a4a" onchange="changeColorText()" name="warnaText">
          </div>
          <div class="form-group">
            <label for="color1">Pilih Warna Background</label>
            <input type="color" id="warnaBackground" value="#ffadad" name="warnaBackground" onchange="changeColorBackground()">
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
  function changeColorText() {
    let color = document.getElementById('warnaText').value;
    document.getElementById('contoh').style.color = color;
  }

  function changeColorBackground() {
    let color = document.getElementById('warnaBackground').value;
    document.getElementById('contoh').style.backgroundColor = color;
  }
</script>