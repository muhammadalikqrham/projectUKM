<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $data['tittle'] ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= BASEURL ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= BASEURL ?>css/sb-admin-2.min.css" rel="stylesheet">
  <!-- <link href="<?= BASEURL ?>css/style.css" rel="stylesheet"> -->
  <!-- Jquery -->
  <script src="<?= BASEURL ?>vendor/jquery/jquery.min.js"></script>
  <!-- plugins -->
  <link href="<?= BASEURL ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="<?= BASEURL ?>ckeditor/ckeditor.js"></script>
  <script src="<?= BASEURL ?>ckfinder/ckfinder.js"></script>

  <style>
    .badge-budaya {
      border-radius: 50px;
      background-color: rgba(255, 173, 173, 1);
      color: rgba(226, 74, 74, 1);
      border-color: transparent;
      font-weight: 500;
    }

    .badge-budaya:hover {
      background-color: rgba(255, 173, 173, 1);
      color: rgba(226, 74, 74, 1);
      cursor: default;
      border-color: transparent;
    }

    .bg-gradient-primary {
      background: #ee8f36;
    }

    .btn-primary {
      background: #ee8f36;
      border: none;
    }

    .text-primary {
      color: #ee8f36 !important;
      /* border: none; */
    }

    .page-item.active .page-link {
      background: #ee8f36;
      border-color: #ee8f36;
    }

    .page-item {
      color: #ee8f36;
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MUDAKREATIF Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?= ($data['tittle'] == "Admin - Dashboard") ? "active" : ""; ?>">
        <a class="nav-link" href="<?= BASEURL ?>dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?= ($data['pages'] == "Banner") ? "active" : ""; ?>">
        <a class="nav-link collapsed" href="<?= BASEURL ?>banner">
          <i class="fas fa-image"></i>
          <span>Banner</span>
        </a>
      </li>
      <!-- <li class="nav-item <?= ($data['pages'] == "Gallery") ? "active" : ""; ?>">
        <a class="nav-link collapsed" href="<?= BASEURL ?>gallery">
          <i class="fas fa-image"></i>
          <span>Gallery</span>
        </a>
      </li> -->
      <li class="nav-item <?= ($data['pages'] == "Gallery") ? "active" : ""; ?>">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseGallery" aria-expanded="false" aria-controls="collapseGallery">
          <i class="fas fa-image"></i>
          <span>Gallery</span>
        </a>
        <div id="collapseGallery" class="collapse <?= ($data['pages'] == "Gallery") ? "show" : ""; ?>" aria-labelledby="headingGallery" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">gallery</h6>
            <a class="collapse-item" href="<?= BASEURL ?>gallery">Gallery</a>
            <a class="collapse-item" href="<?= BASEURL ?>gallery/kategori">Kategori Gallery</a>
          </div>
        </div>
      </li>
      <!-- profil -->
      <li class="nav-item <?= ($data['pages'] == "Profil") ? "active" : ""; ?>">
        <a class="nav-link collapsed" href="<?= BASEURL ?>profil">
          <i class="fas fa-list"></i>
          <span>Profil</span>
        </a>
      </li>
      <!-- Event -->
      <li class="nav-item <?= ($data['pages'] == "Event") ? "active" : ""; ?>">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseEvent" aria-expanded="false" aria-controls="collapseEvent">
          <i class="fas fa-calendar-week"></i>
          <span>Event</span>
        </a>
        <div id="collapseEvent" class="collapse <?= ($data['pages'] == "Event") ? "show" : ""; ?>" aria-labelledby="headingEvent" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Fasililtas</h6>
            <a class="collapse-item" href="<?= BASEURL ?>event">Event</a>
            <a class="collapse-item" href="<?= BASEURL ?>event/kategori">Kategori Event</a>
            <a class="collapse-item" href="<?= BASEURL ?>event/Post">Tambah Event</a>
          </div>
        </div>
      </li>
      <!-- Fasilitas -->
      <li class="nav-item <?= ($data['pages'] == "Fasilitas") ? "active" : ""; ?>">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseFasilitas" aria-expanded="false" aria-controls="collapseFasilitas">
          <i class="fas fa-sliders-h"></i>
          <span>Fasilitas</span>
        </a>
        <div id="collapseFasilitas" class="collapse <?= ($data['pages'] == "Fasilitas") ? "show" : ""; ?>" aria-labelledby="headingFasilitas" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Fasililtas</h6>
            <a class="collapse-item" href="<?= BASEURL ?>fasilitas">Fasilitas</a>
            <a class="collapse-item" href="<?= BASEURL ?>fasilitas/kategori">Kategori Fasilitas</a>
            <a class="collapse-item" href="<?= BASEURL ?>fasilitas/Post">Tambah Fasilitas</a>
          </div>
        </div>
      </li>
      <!-- Wisata -->
      <li class="nav-item <?= ($data['pages'] == "Wisata") ? "active" : ""; ?>">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseWisata" aria-expanded="false" aria-controls="collapseWisata">
          <i class="fas fa-mountain"></i>
          <span>Wisata</span>
        </a>
        <div id="collapseWisata" class="collapse <?= ($data['pages'] == "Wisata") ? "show" : ""; ?>" aria-labelledby="headingWisata" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">wisata</h6>
            <a class="collapse-item" href="<?= BASEURL ?>wisata">Wisata</a>
            <a class="collapse-item" href="<?= BASEURL ?>wisata/kategori">Kategori Wisata</a>
            <a class="collapse-item" href="<?= BASEURL ?>wisata/Post">Tambah Wisata</a>
          </div>
        </div>
      </li>
      <!-- berita -->
      <li class="nav-item <?= ($data['pages'] == "Berita") ? "active" : ""; ?>">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseBerita" aria-expanded="false" aria-controls="collapseBerita">
          <i class="fas fa-newspaper"></i>
          <span>Berita</span>
        </a>
        <div id="collapseBerita" class="collapse <?= ($data['pages'] == "Berita") ? "show" : ""; ?>" aria-labelledby="headingBerita" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Berita</h6>
            <a class="collapse-item" href="<?= BASEURL ?>berita">Berita</a>
            <a class="collapse-item" href="<?= BASEURL ?>berita/kategori">Kategori Berita</a>
            <a class="collapse-item" href="<?= BASEURL ?>berita/Post">Post Berita</a>
          </div>
        </div>
      </li>
      <!-- produk -->
      <li class="nav-item <?= ($data['pages'] == "Produk") ? "active" : ""; ?>">
        <a class="nav-link collapsed" href="tables.html" data-toggle="collapse" data-target="#collapseProduk" aria-expanded="false" aria-controls="collapseProduk">
          <i class="fas fa-shopping-basket"></i>
          <span>Produk</span>
        </a>
        <div id="collapseProduk" class="collapse <?= ($data['pages'] == "Produk") ? "show" : ""; ?>" aria-labelledby="headingProduk" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Produk</h6>
            <a class="collapse-item" href="<?= BASEURL ?>produk">Produk</a>
            <a class="collapse-item" href="<?= BASEURL ?>produk/kategori">Kategori Produk</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- produk -->
      <?php if (isset($_SESSION['role'])) : ?>
        <?php if ($_SESSION['role'] == 'Super Admin') : ?>
          <li class="nav-item <?= ($data['pages'] == "User") ? "active" : ""; ?>">
            <a class="nav-link collapsed" href="tables.html" data-toggle="collapse" data-target="#collapseuser" aria-expanded="false" aria-controls="collapseProduk">
              <i class="fas fa-users"></i>
              <span>user</span>
            </a>
            <div id="collapseuser" class="collapse <?= ($data['pages'] == "user") ? "show" : ""; ?>" aria-labelledby="headinguser" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">user</h6>
                <a class="collapse-item" href="<?= BASEURL ?>user">user</a>
                <a class="collapse-item" href="<?= BASEURL ?>user/add">Tambah user</a>
              </div>
            </div>
          </li>
        <?php endif; ?>
      <?php endif; ?>
      <!-- Divider -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->

            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid nihil vitae laboriosam libero, aspernatur pariatur aperiam dolorem quaerat dicta reprehenderit ducimus culpa architecto? Repellat nesciunt illum, nostrum error earum accusamus.
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama'] ?></span>
                <img class="img-profile rounded-circle" src="<?= BASEURL ?>img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <button class="dropdown-item" href="#" data-toggle="modal" data-target="#editprofil">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ubah Nama
                </button>
                <button class="dropdown-item" href="#" data-toggle="modal" data-target="#editpassword">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ubah Password
                </button>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <!-- modal name -->
        <div class="modal fade" id="editprofil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Ubah Nama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?= BASEURL ?>login/editNama" method="post">
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?= $_SESSION['username'] ?>">
                    <input type="text" name="nama" class="form-control" value="<?= $_SESSION['nama'] ?>">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal name -->
        <!-- modal password -->
        <div class="modal fade" id="editpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?= BASEURL ?>login/editPassword" method="post">
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?= $_SESSION['username'] ?>">
                    <input type="password" name="password" class="form-control">
                  </div>
              </div>
              <div class=" modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Begin Page Content -->
        <div class="container-fluid">