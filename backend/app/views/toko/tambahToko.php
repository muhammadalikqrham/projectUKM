<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Toko</h1>
    <hr>
    <a href="<?= BASEURL ?>toko" class="mb-5 btn btn-primary"">
      <i class=" fa fa-arrow-left"></i> Back
    </a>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Toko</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>toko/tambah" method="POST">
          <div class="form-group">
            <label for="">Nama Toko</label>
            <input type="text" name="nama_toko" class="form-control" aria-describedby="Nama Toko" placeholder="Masukkan Nama Toko">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi Toko</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="Kontak">Kontak Toko (No. Wa)</label>
            <input type="text" name="kontak" class="form-control" aria-describedby="Kontak Toko" placeholder="Masukkan Nomor">
          </div>
          <div class="form-group">
            <label for="">Facebook</label>
            <input type="text" name="fb" class="form-control" aria-describedby="Facebook" placeholder="Masukkan Link Facebook Toko">
          </div>
          <div class="form-group">
            <label for="">Instagram</label>
            <input type="text" name="ig" class="form-control" aria-describedby="Instagram" placeholder="Masukkan Link Instagram Toko">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>