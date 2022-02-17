<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User</h1>
    <hr>
    <a href="<?= BASEURL ?>user/add" class="mb-5 btn btn-primary"">
      <i class=" fa fa-plus-circle"></i> Tambah User
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
                <th class="text-center" width="20%">Username</th>
                <th class="text-center" width="5%">Nama</th>
                <th class="text-center" width="5%">Role</th>
                <th class="text-center" width="5%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data as $row) :
              ?>
                <tr>
                  <td class="text-center"><?= $no ?></td>
                  <td class="text-center"><?= $row['username'] ?></td>
                  <td class="text-center"><?= $row['nama'] ?></td>
                  <td class="text-center"><?= $row['role'] ?></td>
                  <td> <a href="<?= BASEURL ?>user/edit/<?= $row['username'] ?>" class="btn btn-success btn-circle btn-sm float-center">
                      <i class="fas fa-edit"></i></a>
                    <a href="<?= BASEURL ?>user/hapus/<?= $row['username'] ?>" class="btn btn-danger btn-sm btn-circle float-center" onclick="return confirm('Yakin ingin menghapus berita ini ?')"><i class="fas fa-trash"></i></a>
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