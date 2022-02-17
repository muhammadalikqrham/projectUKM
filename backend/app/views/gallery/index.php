<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gallery</h1>
    <hr>
    <a href="<?= BASEURL ?>gallery/add" class="mb-5 btn btn-primary"">
      <i class=" fa fa-plus-circle"></i> Tambah Gallery
    </a>
    <?php Flasher::flash() ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Gambar Gallery</h6>
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
              <?php $no = 1;

              // echo count($data);
              ?>
              <?php for ($i = 0; $i <= round(count($data) / 4); $i++) :
              ?>
                <tr>
                  <?php for ($j = 4 * $i; $j < 4 * ($i + 1); $j++) :
                    if ($j > (count($data) - 1)) {
                      break;
                    }
                  ?>

                    <td>
                      <button type="button" id="<?= $data[$j]['id_gallery'] ?>" class="btn tes" data-target="#tampilGallery<?= $data[$j]['id_gallery'] ?>" data-toggle="modal" onclick="getId(this)">
                        <input type="hidden" id="caption<?= $data[$j]['id_gallery'] ?>" value="<?= $data[$j]['deskripsi'] ?>">
                        <img id="gambar<?= $data[$j]['id_gallery'] ?>" src="<?= BASEURL . 'image/gallery/a' . $data[$j]['gambar'] ?>" alt="" width="264" height="175">
                      </button>
                    </td>
                  <?php endfor; ?>
                </tr>
                <?php $no++;
                ?>
              <?php endfor; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
<div class="modal fade" id="tampilGallery" tabindex="-1" aria-labelledby="tampilGalleryModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mr-auto" id="tittle"></h5>
        <a id="hapus" href="<?= BASEURL ?>gallery/hapusFoto" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini ?, Data yang telah di hapus tidak dapat kembali')"><i class="fas fa-trash"></i> Hapus</a>
        <!-- <form id="publish" action="<?= BASEURL ?>banner/publishBanner" method="POST">
          <input type="hidden" value="" id="id" name="id_banner">
          <button type="submit" id="btn-publish" name="" class="btn btn-danger" onclick="publish(this)"> tes </button>
        </form> -->
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
    document.querySelector("div.modal.fade").id = "tampilGallery" + btn.id;
    document.getElementById("gambarModal").src = document.getElementById("gambar" + btn.id).src;
    document.getElementById("tittle").innerHTML = document.getElementById("caption" + btn.id).value;
    document.getElementById('hapus').href = '<?= BASEURL ?>gallery/hapusFoto' + '/' + btn.id;
    document.getElementById('id').value = btn.id;
    const x = document.getElementById('status' + btn.id).value;
    // if (x == 'unpublished') {
    //   // console.log(true);
    //   document.getElementById("btn-publish").innerHTML = "Publish";
    //   document.getElementById("btn-publish").name = "Published";
    //   document.getElementById("btn-publish").classList.remove('btn-danger')
    //   document.getElementById("btn-publish").classList.add("btn-primary");
    // } else {
    //   document.getElementById("btn-publish").innerHTML = "Take Down";
    //   document.getElementById("btn-publish").name = "Takedown";
    //   document.getElementById("btn-publish").classList.remove('btn-primary')
    //   document.getElementById("btn-publish").classList.add("btn-danger");
    // }

  }

  function publish(btn) {
    const x = document.getElementById("btn-publish").name;
    console.log(document.getElementById("publish").onsubmit = confirm('Anda yakin ingin ' + x + ' banner ini ?'));

  }
</script>