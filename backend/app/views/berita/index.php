<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Berita</h1>
    <hr>
    <a href="<?= BASEURL ?>berita/post" class="mb-5 btn btn-primary"">
      <i class=" fa fa-plus-circle"></i> Posting Berita
    </a>
    <?php Flasher::flash() ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Berita</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" width="5%">No</th>
                <th class="text-center" width="20%">Judul</th>
                <th class="text-center" width="5%">Kategori</th>
                <th class="text-center" width="15%">Penulis</th>
                <th class="text-center" width="15%">Tanggal Upload</th>
                <th class="text-center" width="15%">Status</th>
                <th class="text-center" width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data as $row) :

              ?>
                <tr>
                  <td class="text-center"><?= $no ?></td>
                  <td class=""><?= $row['judul'] ?></td>
                  <td class="text-center"><?= $row['kategori_berita'] ?></td>
                  <!-- <td class=""><?= (strlen($row['konten']) > 150) ? substr($row['konten'], 0, 150) . '...' : $row['konten'] ?></td> -->
                  <td class="text-center"><?= $row['penulis'] ?></td>
                  <td class="text-center"><?= date("d F Y", strtotime($row['tanggal_upload'])) ?></td>
                  <td class="text-center"><?= $row['status'] == 'Published' ? 'Telah di terbitkan' : 'Belum di terbitkan' ?></td>
                  <td class="text-center">
                    <button class="btn btn-primary btn-circle btn-sm float-center" data-toggle="modal" data-target="#tampilBerita<?= $row['id_berita'] ?>">
                      <i class="fas fa-eye"></i></button>
                    <a href="<?= BASEURL ?>berita/edit_berita/<?= $row['id_berita'] ?>" class="btn btn-success btn-circle btn-sm float-center">
                      <i class="fas fa-edit"></i></a>
                      <?php if(isset($_SESSION['role'])) : ?>
                        <?php if ($_SESSION['role'] == 'Super Admin') :?>
                    <a href="<?= BASEURL ?>berita/hapusBerita/<?= $row['id_berita'] ?>" class="btn btn-danger btn-sm btn-circle float-center" onclick="return confirm('Yakin ingin menghapus berita ini ?')"><i class="fas fa-trash"></i></a>
                 <?php endif;?>
                 <?php endif;?>
                  </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="tampilBerita<?= $row['id_berita'] ?>" tabindex="-1" aria-labelledby="tampilBeritaModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="tampilBeritaModal"><?= $row['judul'] ?></h5>
                        <form action="<?= BASEURL ?>berita/publishBerita" method="POST" onsubmit="confirm('Anda Yakin ingin <?= $row['status'] == 'Published' ? 'Take Down' : 'Terbitkan' ?> Berita ini ?')">
                          <input type="hidden" value="<?= $row['id_berita'] ?>" name="id_berita">
                          <button type="submit" name="<?= $row['status'] ?>" class="btn <?= $row['status'] == 'Published' ? 'btn-danger' : 'btn-primary' ?> ml-auto"><?= $row['status'] == 'Published' ? 'Take Down' : 'Terbitkan' ?></button>
                        </form>
                        <button type="button" class="ml-2 btn btn-secondary" data-dismiss="modal" aria-label="Close">
                          Tutup
                        </button>
                      </div>
                      <div class="modal-body">
                        <img src="<?= BASEURL ?>image/berita/a<?= $row['gambar'] ?>" class="card-img-top mb-5" alt="" width="1024">
                        <span class="text-justify"><?= $row['konten'] ?></span>
                      </div>
                      <!-- <div class="modal-footer">
                      </div> -->
                    </div>
                  </div>
                </div>
                <?php $no++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>