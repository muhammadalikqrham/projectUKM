<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Banner</h1>
    <hr>
    <a href="<?= BASEURL ?>banner/add" class="mb-5 btn btn-primary"">
      <i class=" fa fa-plus-circle"></i> Tambah Banner
    </a>
    <?php Flasher::flash() ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Gambar Banner</h6>
          </div>
          <div class="col-6 d-flex justify-content-end">
            <form action="<?= BASEURL ?>banner/hapus/" method="post">
              <button class="btn btn-danger">Hapus Banner</button>
          </div>
        </div>

      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" width="5%" colspan="5"></th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($data)) : ?>
                <tr>
                  <td align="center">Gambar banner belum ada silahkan tambah dulu</td>
                </tr>
              <?php else : ?>
                <p class="text-danger"><sup>*</sup>Pilih banner yang ingin dihapus</p>
                <?php $no = 1;

                // echo count($data);
                ?>
                <?php for ($i = 0; $i <= round(count($data) / 5); $i++) :
                ?>
                  <tr>
                    <?php for ($j = 5 * $i; $j < 5 * ($i + 1); $j++) :
                      if ($j > (count($data) - 1)) {
                        break;
                      }
                    ?>

                      <td>
                        <input type="checkbox" name="banner[]" id="" class="" value="<?= $data[$j]['id_banner'] ?>">
                        <label for="checkbox"><?= $data[$j]['status'] ?></label>
                        <button type="button" id="<?= $data[$j]['id_banner'] ?>" class="btn tes" data-target="#tampilBanner<?= $data[$j]['id_banner'] ?>" data-toggle="modal" onclick=" getId(this)">
                          <!-- <input type="hidden" id="caption<?= $data[$j]['id_banner'] ?>" value="<?= $data[$j]['caption'] ?>"> -->
                          <input type="hidden" id="status<?= $data[$j]['id_banner'] ?>" value="<?= $data[$j]['status'] ?>">
                          <img id="gambar<?= $data[$j]['id_banner'] ?>" src="<?= BASEURL . 'image/banner/a' . $data[$j]['gambar'] ?>" alt="" width="264" height="175">
                        </button>
                      </td>
                    <?php endfor; ?>
                  </tr>
                  <?php $no++;
                  ?>
                <?php endfor; ?>
              <?php endif; ?>
              </form>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
<div class="modal fade" id="tampilBanner" tabindex="-1" aria-labelledby="tampilBannerModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mr-auto" id="tittle"></h5>
        <form id="publish" action="<?= BASEURL ?>banner/publishBanner" method="POST">
          <input type="hidden" value="" id="id" name="id_banner">
          <button type="submit" id="btn-publish" name="" class="btn btn-danger" onclick="publish(this)"> tes </button>
        </form>
        <button type="button" class="ml-2 btn btn-secondary" data-dismiss="modal" aria-label="Close">
          Tutup
        </button>
      </div>
      <div class="modal-body">
        <img src="" id="gambarModal" class="card-img-top mb-5" alt="">
      </div>
      <!-- <div class="modal-footer">
                      </div> -->
    </div>
  </div>
</div>

<script>
  function getId(btn) {
    document.querySelector("div.modal.fade").id = "tampilBanner" + btn.id;
    document.getElementById("gambarModal").src = document.getElementById("gambar" + btn.id).src;
    // document.getElementById("tittle").innerHTML = document.getElementById("caption" + btn.id).value;
    document.getElementById('id').value = btn.id;
    const x = document.getElementById('status' + btn.id).value;
    console.log(x);
    if (x == 'unpublished') {
      // console.log(true);
      document.getElementById("btn-publish").innerHTML = "Publish";
      document.getElementById("btn-publish").name = "Published";
      document.getElementById("btn-publish").classList.remove('btn-danger')
      document.getElementById("btn-publish").classList.add("btn-primary");
    } else {
      document.getElementById("btn-publish").innerHTML = "Take Down";
      document.getElementById("btn-publish").name = "Takedown";
      document.getElementById("btn-publish").classList.remove('btn-primary')
      document.getElementById("btn-publish").classList.add("btn-danger");
    }

  }

  function publish(btn) {
    const x = document.getElementById("btn-publish").name;
    console.log(document.getElementById("publish").onsubmit = confirm('Anda yakin ingin ' + x + ' banner ini ?'));

  }
</script>