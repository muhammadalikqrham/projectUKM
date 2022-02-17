<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Produk</h1>
    <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori Produk</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>produk/add_kategori_produk" method="POST">
          <div class="form-group">
            <label for="text1">Kategori Produk</label>
            <input type="text" name="kategori_produk" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>