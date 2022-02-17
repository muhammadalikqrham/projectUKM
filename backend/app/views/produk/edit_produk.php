<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <?php
    $explode = explode(' x ', $data[1]['dimensi']);
    ?>
    <h1 class="h3 mb-4 text-gray-800">Produk</h1>
    <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Produk Desa</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>produk/edit_produk" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="text1">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="<?= $data[1]['nama_produk'] ?>">
            <input type="hidden" name="id_produk" class="form-control" value="<?= $data[1]['id_produk'] ?>" readonly>
          </div>
          <div class="form-group">
            <label for="text1">Harga Produk</label>
            <input type="text" name="harga_produk" class="form-control" value="<?= $data[1]['harga_produk'] ?>">
          </div>
          <div class="form-group">
            <label for="text1">Kategori Produk</label>
            <select name="kategori_produk" id="kategori" class="form-control">
              <?php foreach ($data[0] as $row) : ?>
                <option value="<?= $row['id_kategori_produk'] ?>" <?= $row['id_kategori_produk'] == $data[1]['id_kategori_produk'] ? 'selected' : '' ?>><?= $row['nama_kategori_produk'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="dimensi">Dimensi Produk (Ukuran P x L x T)</label>
            <div class="row">
              <div class="col-1">
                <input type="text" class="form-control" name="panjang" placeholder="panjang" value="<?= $explode[0] ?>">
              </div>
              <div class="col-1">
                <input type="text" class="form-control" name="lebar" placeholder="lebar" value="<?= $explode[1] ?>">
              </div>
              <div class="col-1">
                <input type="text" class="form-control" name="tinggi" placeholder="tinggi" value="<?= $explode[2] ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="warna">Warna Produk</label>
            <input type="text" name="warna_produk" id="warna" class="form-control" value="<?= $data[1]['warna'] ?>">
          </div>
          <div class="form-group">
            <label for="text1">Deskripsi Produk</label>
            <textarea name="deskripsi_produk" id="deskripsi" cols="30" rows="3" class="form-control"><?= $data[1]['deskripsi'] ?></textarea>
          </div>
          <div class="form-group">
            <p for="gambar">Gambar </p>
            <input type="hidden" name="gambar" value="<?= $data[1]['gambar'] ?>" readonly>
            <img src="<?= BASEURL ?>image/produk/a<?= $data[1]['gambar'] ?>" alt="" width="256">
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