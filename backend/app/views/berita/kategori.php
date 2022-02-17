<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Berita</h1>
    <hr>

    <a href="<?= BASEURL ?>/berita/tambahKategori" class="mb-5 btn btn-primary"">
      <i class=" fa fa-plus-circle"></i> Tambah Kategori
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
                <th class="text-center" width="10%">No</th>
                <th class="text-center" width="80%">Kategori Berita</th>
                <th class="text-center" width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data as $row) :
              ?>
                <tr>
                  <td class="text-center"><?= $no ?></td>
                  <td class=""><?= $row['kategori_berita'] ?></td>
                  <td class="">
                    <a href="<?= BASEURL ?>berita/edit/<?= $row['id_kategori_berita'] ?>" class="btn btn-success btn-circle float-center">
                      <i class="fas fa-edit"></i></a>
                    <?php if (isset($_SESSION['role'])) : ?>
                      <?php if ($_SESSION['role'] == 'Super Admin') : ?>
                        <a href="apps/desa/del_desa.php?id=<?= $row['id_kategori_berita'] ?>" class="btn btn-danger btn-circle float-center"><i class="fas fa-trash"></i></a>
                      <?php endif; ?>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php $no++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>