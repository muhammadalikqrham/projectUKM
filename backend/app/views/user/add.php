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
        <form action="<?= BASEURL ?>user/tambah_user" method="POST" onsubmit="return registerValid()">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required>
            <div class="valid-feedback" id="feedback_user">
              Looks good!
            </div>
          </div>
          <div class="form-group">
            <label for="text1">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
          </div>
          <div class="form-group">
            <label for="password">Passowrd</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            <div class="valid-feedback" id="feedback-pass">
              Looks good!
            </div>
          </div>
          <div class="form-group">
            <label for="konfirmasi_password">Konfirmasi password</label>
            <input type="password" class="form-control" id="konfirmasi_password" placeholder="konfirmasi password" required>
            <div class="valid-feedback" id="feedback_konf">
              Looks good!
            </div>
          </div>
          <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control">
              <option value="Super Admin">Super Admin</option>
              <option value="Admin">Admin</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" value="Simpan" class="btn btn-primary" id="submit">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(function registerValid() {
    let status1 = false;
    let status2 = false;
    let status3 = false;
    $('#username').change(function() {
      let username = document.getElementById('username').value;
      // console.log(username);
      $.ajax({
        url: 'http://localhost/samarindah/admin/login/cekUser',
        data: {
          id: username
        },
        method: 'post',
        dataType: 'json',
        success: function(data) {
          if (data.length > 0) {
            $('#username').addClass('is-invalid');
            $('#username').removeClass('is-valid');
            $('#feedback_user').removeClass('valid-feedback');
            $('#feedback_user').addClass('invalid-feedback');
            $('#feedback_user').html('Username Telah terdaftar');

            status1 = false;
          } else {
            $('#username').addClass('is-valid');
            $('#username').removeClass('is-invalid');
            $('#feedback_user').removeClass('invalid-feedback');
            $('#feedback_user').addClass('valid-feedback');
            $('#feedback_user').html('Looks Good');

            status1 = true;
          }
        }
      })
    })
    $('#password').change(function() {
      let password = document.getElementById('password').value;
      if (password.length < 7) {
        $('#password').addClass('is-invalid');
        $('#password').removeClass('is-valid');
        $('#feedback-pass').removeClass('valid-feedback');
        $('#feedback-pass').addClass('invalid-feedback');
        $('#feedback-pass').html('Password minimal memiliki 8 kata');

        status2 = false;
      } else {
        $('#password').removeClass('is-invalid');
        $('#password').addClass('is-valid');
        $('#feedback-pass').removeClass('valid-feedback');
        $('#feedback-pass').addClass('invalid-feedback');
        $('#feedback-pass').html('Looks Good');

        status2 = true;
      }
    })
    $('#konfirmasi_password').change(function() {
      let password = document.getElementById('password').value;
      let konfirmasi_password = document.getElementById('konfirmasi_password').value;
      if (password === konfirmasi_password) {
        $('#konfirmasi_password').removeClass('is-invalid');
        $('#konfirmasi_password').addClass('is-valid');
        $('#feedback_konf').addClass('valid-feedback');
        $('#feedback_konf').removeClass('invalid-feedback');
        $('#feedback_konf').html('Looks Good');

        status3 = true
      } else {
        $('#konfirmasi_password').addClass('is-invalid');
        $('#konfirmasi_password').removeClass('is-valid');
        $('#feedback_konf').removeClass('valid-feedback');
        $('#feedback_konf').addClass('invalid-feedback');
        $('#feedback_konf').html('Password dan Konfirmasi Password Harus Sama !');

        status3 = false;
      }
    })
    $('#submit').click(function() {
      if (status1 == true && status2 == true && status3 == true) {
        console.log('true');
        return true;
      } else {
        alert('Data Tidak Valid!!!')
        return false;
      }
    })
  })
</script>