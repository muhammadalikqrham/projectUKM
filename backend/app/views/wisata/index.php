<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Wisata</h1>
    <hr>
    <a href="<?= BASEURL ?>wisata/post" class="mb-5 btn btn-primary"">
      <i class=" fa fa-plus-circle"></i> Tambah Wisata
    </a>
    <?php Flasher::flash() ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Wisata</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" width="5%">No</th>
                <th class="text-center" width="20%">Judul</th>
                <th class="text-center" width="5%">Kategori</th>
                <th class="text-center" width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data as $row) :

              ?>
                <tr>
                  <td class="text-center"><?= $no ?></td>
                  <td class=""><?= $row['nama'] ?></td>
                  <td class="text-center"><?= $row['nama_kategori_wisata'] ?></td>
                  <td class="text-center">
                    <button class="btn btn-primary btn-circle btn-sm float-center" data-toggle="modal" data-target="#tampilWisata<?= $row['id_wisata'] ?>">
                      <i class="fas fa-eye"></i></button>
                    <a href="<?= BASEURL ?>wisata/ubah/<?= $row['id_wisata'] ?>" class="btn btn-success btn-circle btn-sm float-center">
                      <i class="fas fa-edit"></i></a>
                    <?php if (isset($_SESSION['role'])) : ?>
                      <?php if ($_SESSION['role'] == 'Super Admin') : ?>
                        <a href="<?= BASEURL ?>wisata/hapusWisata/<?= $row['id_wisata'] ?>" class="btn btn-danger btn-sm btn-circle float-center" onclick="return confirm('Yakin ingin menghapus berita wisata ini ?')"><i class="fas fa-trash"></i></a>
                      <?php endif; ?>
                    <?php endif; ?>
                  </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="tampilWisata<?= $row['id_wisata'] ?>" tabindex="-1" aria-labelledby="tampilWisataModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="tampilWisataModal"><?= $row['nama'] ?></h5>
                        <input type="hidden" value="<?= $row['id_wisata'] ?>" name="id_wisata">
                        <!-- <button type="submit" name="<?= $row['status'] ?>" class="btn <?= $row['status'] == 'Published' ? 'btn-danger' : 'btn-primary' ?> ml-auto"><?= $row['status'] == 'Published' ? 'Take Down' : 'Terbitkan' ?></button> -->
                        <button type="button" class="ml-2 btn btn-secondary" data-dismiss="modal" aria-label="Close">
                          Tutup
                        </button>
                      </div>
                      <div class="modal-body">
                        <img src="<?= BASEURL ?>image/wisata/a<?= $row['gambar'] ?>" class="card-img-top mb-5" alt="" width="1024">
                        <span class="text-justify"><?= $row['deskripsi'] ?></span>
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