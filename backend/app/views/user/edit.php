<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Produk</h1>
    <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah user</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>user/tambah_user" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="text1">Username</label>
            <input type="text" name="username" class="form-control">
          </div>
          <div class="form-group">
            <label for="text1">Nama</label>
            <input type="text" name="nama" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Passowrd</label>
            <input type="password" class="form-control" id="password" placeholder="Password" required>
            <!-- <div class="valid-feedback">
              Looks good!
            </div>
            <p class="text-danger font-monospace" hidden="true">Password minimal 8 karakter</p> -->
          </div>
          <div class="form-group">
            <label for="konfirmasi_password">Konfirmasi password</label>
            <input type="konfirmasi_password" class="form-control" id="konfirmasi_password" placeholder="konfirmasi password" required>
            <!-- <div class="valid-feedback">
              Looks good!
            </div> -->
          </div>
          <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control">
              <option value="Super Admin">Super Admin</option>
              <option value="Admin">Admin</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>