<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Produk</h1>
    <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Produk Desa</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>produk/tambah_produk" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="text1">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk">
            <input type="hidden" value="<?= $keywords ?>" name="id">
          </div>
          <div class="form-group">
            <label for="text1">Harga Produk</label>
            <input type="text" name="harga_produk" id="harga" class="form-control" name="Harga Produk">
          </div>
          <div class="form-group">
            <label for="text1">Kategori Produk</label>
            <select name="kategori_produk" id="kategori" class="form-control">
              <?php foreach ($data as $row) : ?>
                <option value="<?= $row['id_kategori_produk'] ?>"><?= $row['nama_kategori_produk'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="penjual">Penjual</label>
            <input type="text" class="form-control" name="penjual" id="penjual">
          </div>
          <div class="form-group">
            <label for="no_hp">No. Handphone</label>
            <input type="text" class="form-control" name="no_hp" id="no_hp">
          </div>
          <div class="form-group">
            <label for="dimensi">Dimensi Produk (Ukuran P x L x T)</label>
            <div class="row">
              <div class="col-1">
                <input type="text" class="form-control" name="panjang" placeholder="panjang" id="panjang">
              </div>
              <div class="col-1">
                <input type="text" class="form-control" name="lebar" placeholder="lebar" id="lebar">
              </div>
              <div class="col-1">
                <input type="text" class="form-control" name="tinggi" placeholder="tinggi" id="tinggi">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="warna">Warna Produk</label>
            <input type="text" name="warna_produk" id="warna" class="form-control">
          </div>
          <div class="form-group">
            <label for="text1">Deskripsi Produk</label>
            <textarea name="deskripsi_produk" id="deskripsi" cols="30" rows="3" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="text1">Upload Gambar</label>
            <input type="file" class="form-control-file" name="gambar">
          </div>
          <div class="form-group">
            <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>