<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profil</h1>
    <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profil Desa</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" width="5%">No</th>
                <th class="text-center" width="25%">Deskripsi</th>
                <th class="text-center" width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <tr>
                <td class="text-center"><?= $no ?></td>
                <td class=""><?= $data['Keterangan'] ?></td>
                <td class="text-center">
                  <a href="<?= BASEURL ?>profil/edit/<?= $data['Kategori'] ?>" class="btn btn-success btn-circle float-center">
                    <i class="fas fa-edit"></i></a>
                </td>
              </tr>
              <?php $no++; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>