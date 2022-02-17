<div class="row">
  <div class="col">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Banner</h1>
    <hr>
    <a href="<?= BASEURL ?>banner" class="mb-5 btn btn-primary"">
      <i class=" fa fa-arrow-left"></i> Back
    </a>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Posting Banner</h6>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL ?>banner/postBanner" method="POST" enctype="multipart/form-data">
          <!-- <div class="form-group">
            <label for="exampleInputEmail1">Caption</label>
            <input type="text" name="caption" class="form-control" required aria-describedby="Caption" placeholder="Masukkan Caption">
          </div> -->
          <div class="form-group">
            <label for="banner">Upload Gambar</label>
            <input type="file" name="banner[]" class="form-control-file" required multiple>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>