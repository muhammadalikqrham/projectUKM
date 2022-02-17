<footer style="margin-top: 8rem;">
  <hr>
  <!-- <div class="row pt-5 bg-footer"></div> -->
  <div class="container">
    <div class="col-12 d-flex justify-content-center">
      <img src="<?= BASEURL; ?>assets/image/icon/Samar Indah.svg" alt="" style="width: 15rem; margin-top: 1rem;">
    </div>
    <div class="row pt-5 mx-5">
      <!-- Layanan Kami -->
      <div class="col-sm-12 col-md-12 col-lg-5 justify-content-between mb-4">
        <h4 style="font-weight: 600; color: #393D43;">Layanan Kami</h4>
        <ul class="list-unstyled" style="margin-top: 1.2rem;">
          <li>
            <div class="d-flex">
              <img src="<?= BASEURL; ?>assets/image/icon/Telephone.svg" width="20rem" alt="">
              <p class="text-content-footer ms-3 mb-0"> (0541)-765016</p>
            </div>
          </li>
          <li style="margin-top: 1.2rem;">
            <div class="d-flex">
              <img src="<?= BASEURL; ?>assets/image/icon/Location2.svg" class="align-self-center" height="20rem" alt="">
              <p class="text-content-footer ms-3 mb-0" style="font-size: 1rem; font-weight: 500; line-height: 1.5rem;">Pasar Pagi, Samarinda Kota, Samarinda,
                Kalimantan Timur 75123 Indonesia</p>
            </div>
          </li>
          <li style="margin-top: 1.2rem;">
            <a href="#" class="link-produk">
              <div class="d-flex">
                <img src="<?= BASEURL; ?>assets/image/icon/WhatsApp.svg" width="20rem" alt="">
                <p class="ms-3 mb-0" style=" font-size: 1rem; font-weight: 500;">(+62)812-3456-7890</p>
              </div>
            </a>
          </li>
        </ul>
      </div>
      <!-- End of Layanan Kami -->
      <!-- Produk Kami -->
      <div class="col-sm-12 col-md-12 col-lg-5 justify-content-between mb-4">
        <h4 style="font-weight: 600; color: #393D43;">Produk Kami</h4>
        <div class="row">
          <?php
          $angka = 0;
          for ($i = 0; $i < 4; $i++) : ?>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <ul class="list-unstyled" style="margin-top: 1.2rem;">
                <?php for ($j = 0; $j < count($data['kategori_produk']); $j++) : ?>
                  <?php
                  if ($j == 4) {
                    break;
                  }
                  if ($angka >= count($data['kategori_produk'])) {
                    break;
                  }
                  ?>
                  <li style="margin-top: 0.5rem;">
                    <a href="<?= BASEURL ?>produk/kategori/<?= urlencode($data['kategori_produk'][$angka]['nama_kategori_produk']) ?>" class="mb-0 link-produk" style="font-size: 1rem; font-weight: 500;"><?= $data['kategori_produk'][$angka]['nama_kategori_produk'] ?></a>
                  </li>

                <?php
                  $angka++;
                endfor; ?>
              </ul>
            </div>
          <?php endfor; ?>
        </div>
      </div>
      <!-- End of Produk Kami -->
      <!-- Follow Us -->
      <div class="col-sm-12 col-md-12 col-lg-2 justify-content-between mb-4">
        <h4 style="font-weight: 600; color: #393D43;">Follow Us</h4>
        <ul class="list-unstyled">
          <li style="margin-top: 1.2rem;">
            <a href="#" class="link-produk">
              <div class="d-flex">
                <img src="<?= BASEURL; ?>assets/image/icon/Instagram.svg" width="20rem" alt="">
                <p class="ms-3 mb-0" style=" font-size: 1rem; font-weight: 500;"> Instagram</p>
              </div>
            </a>
          </li>
          <li style="margin-top: 1.2rem;">
            <a href="" class="link-produk">
              <div class="d-flex">
                <img src="<?= BASEURL; ?>assets/image/icon/Facebook.svg" class="align-self-center" height="20rem" alt="">
                <p style=" font-size: 1rem; font-weight: 500;" class="ms-3 mb-0">Facebook</p>
              </div>
            </a>
          </li>
          <li style="margin-top: 1.2rem;">
            <a href="" class="link-produk">
              <div class="d-flex">
                <img src="<?= BASEURL; ?>assets/image/icon/Twitter.svg" class="align-self-center" height="20rem" alt="">
                <p style=" font-size: 1rem; font-weight: 500;" class="ms-2 mb-0">Twitter</p>
              </div>
            </a>
          </li>
        </ul>
      </div>
      <!-- End of Follow Us -->
    </div>
  </div>
  </div>
  <div class="container-fluid mt-sm-3 mt-md-3 mt-lg-5">
    <div class="row d-flex " style="height: 3rem; background-color: #F5F5F5;">
      <div class="col-12 d-flex justify-content-center align-self-center">
        <p class="pt-2" style="font-size: 0.8rem; color: #414141; text-align: center;">&copy Copyright 2021 | Designed by <span class="fw-bold">FRY Teams</span>. All right reserved.</p>
      </div>
    </div>
  </div>
</footer>
<!-- <script src="<?= BASEURL; ?>assets/js/bootstrap.js"></script> -->
<script src="<?= BASEURL; ?>assets/js/jquery-3.6.0.min.js"></script>
<script src="<?= BASEURL; ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL; ?>assets/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= BASEURL ?>assets/js/isotope.pkgd.js"></script>
<script src="<?= BASEURL ?>assets/js/jquery.magnific-popup.js"></script>
<script>
  $('.owl-carousel').owlCarousel({
    stagePadding: 50,
    loop: false,
    navText: ["<i class='fas fa-chevron-left navbar-owl'></i>", "<i class='fas fa-chevron-right navbar-owl'></i>"],
    nav: true,
    margin: 10,
    autoplay: false,
    autoplayTimeout: 10000,
    navcontainer: '#test',
    responsive: {
      0: {
        items: 1,
        nav: false
      },
      600: {
        items: 2,
        nav: false
      },
      800: {
        items: 3,
        nav: false
      },
      1000: {
        items: 4
      },
      1100: {
        items: 5
      }
      // 1400: {
      //   items: 6
      // }
    }
  })
</script>
<script>
  $(document).ready(function() {
    var popup_btn = $('.popup-btn');
    popup_btn.magnificPopup({
      type: 'image',
      gallery: {
        enabled: true
      }
    });
  });
</script>
</body>

</html>