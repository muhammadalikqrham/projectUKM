<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="<?= BASEURL ?>css/bootstrap.css">
  <script src="js/bootstrap.bundle.js"></script>
  <link rel="stylesheet" href="<?= BASEURL ?>css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sonsie+One&display=swap" rel="stylesheet">
  <script src="<?= BASEURL ?>js/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div class="container">
    <form action="<?= BASEURL ?>login/cekLogin" method="post" onsubmit="return validateForm()">
      <div class="row d-flex justify-content-center" style="padding-top: 20%;">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 px-4  card shadow align-items-center">
          <img src="<?= BASEURL ?>image/icon/Samar Indah.svg" alt="" width="340" height="150">
          <span style="color: #363636; font-weight: 500; font-size: 1.5rem;" class="pb-4">Masuk dulu ke akun mu, yuk !</span>
          <input type="text" class="form-control style-form" id="username" placeholder="Username" name="username">
          <div class="invalid-feedback" id="invalidFeedback">Username atau password Salah</div>
          <div class="py-3">
          </div>
          <input type="password" class="form-control style-form" id="password" placeholder="Password" name="password">
          <div class="invalid-feedback" id="invalidFeedback">Username atau password Salah</div>
          <input type="submit" class="btn btn-login mt-3" style="width: 100%;">
          <div class="form-group py-3">
            </input>
          </div>
          <!-- <div class="form-group d-flex" style="color: #717171; font-weight: 500;">
          <span class="text-gray">Lupa kata sandi?</span>
          <span class="ms-auto text-gray">Atau belum daftar</span>
        </div>
        <div class="form-group d-flex pb-3">
          <a href="#" class="text-secondary-cust">coba ganti disini</a>
          <a href="#" class="ms-auto text-secondary-cust">Yuk Daftar Disini</a>
        </div> -->
        </div>
    </form>
  </div>
  </div>
  <footer>
    <div class="container-fluid fixed-bottom">
      <div class="row d-flex " style="height: 40px; background-color: #F5F5F5;">
        <div class="col-12 d-flex justify-content-center align-self-center">
          <p style="font-size: 13px; color: #414141;">&copy Copyright 2021 | Designed by <span class="fw-bold">FRY Teams</span>. All right reserved.</p>
        </div>
      </div>
    </div>
  </footer>
</body>
<script>
  $(function validateForm() {
    $('.btn-login').on('click', function() {
      //    e.preventDefault();
      if ($('#username').val() == '' && $('#password').val() == '') {
        $('input#username').addClass('is-invalid');
        $('input#password').addClass('is-invalid');
        $('.invalid-feedback').html("Username dan Password harus diisi");

        return false;
      } else if ($('#username').val() != '' && $('#password').val() == '') {
        $('input#password').addClass('is-invalid');
        $('.invalid-feedback').html("Password harus diisi");

        return false;
      } else if ($('#username').val() == '' && $('#password').val() != '') {
        $('input#username').addClass('is-invalid');
        $('.invalid-feedback').html("Username dan Password harus diisi");

        return false;
      } else {
        return true;
      }
    })
  });
</script>

</html>