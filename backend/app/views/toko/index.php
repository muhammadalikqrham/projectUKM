<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Berita</h1>
    <hr>

    <a href="<?= BASEURL ?>toko/tambahToko" class="mb-5 btn btn-primary"">
      <i class=" fa fa-plus-circle"></i> Posting Berita
    </a>
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
                <th class="text-center" width="20%">Toko</th>
                <th class="text-center" width="30%">Deskripsi</th>
                <th class="text-center" width="20%">Alamat</th>
                <th class="text-center" width="15%">kontak</th>
                <th class="text-center" width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data as $row) :
              ?>
                <tr>
                  <td class="text-center"><?= $no ?></td>
                  <td class=""><?= $row['nama_toko'] ?></td>
                  <td class=""><?= $row['deskripsi_toko'] ?></td>
                  <td class=""><?= $row['alamat'] ?></td>
                  <td class=""><?= $row['kontak'] ?></td>
                  <td class="text-center">
                    <a href="edit_prov.php?id=<?= $row['id_toko'] ?>" class="btn btn-success btn-circle float-center">
                      <i class="fas fa-edit"></i></a>|
                    <a href="apps/desa/del_desa.php?id=<?= $row['id_toko'] ?>" class="btn btn-danger btn-circle float-center"><i class="fas fa-trash"></i></a>
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