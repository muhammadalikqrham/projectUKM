<?php
class Wisata extends Controller
{
  public function index()
  {
    $data['tittle'] = "Admin - Wisata";
    $data['pages'] = "Wisata";
    $data['wisata'] = $this->model('Wisata_model')->getAllWisata();
    $this->view('templates/header', $data);
    $this->view('wisata/index', $data['wisata']);
    $this->view('templates/footer');
  }
  public function kategori()
  {
    $data['tittle'] = "Admin - Wisata";
    $data['pages'] = "Wisata";
    $data['kategori_wisata'] = $this->model('Wisata_model')->getAllKategoriWisata();
    $this->view('templates/header', $data);
    $this->view('wisata/kategori', $data['kategori_wisata']);
    $this->view('templates/footer');
  }
  public function add()
  {
    $data['tittle'] = "Admin - Tambah Kategori Wisata";
    $data['pages'] = "Wisata";
    $this->view('templates/header', $data);
    $this->view('wisata/tambah_kategori');
    $this->view('templates/footer');
  }
  public function ubah($id)
  {
    $data['tittle'] = "Admin - Tambah Kategori Wisata";
    $data['pages'] = "Wisata";
    $data['wisata'] = $this->model('Wisata_model')->getWisataById($id);
    $data['kategori_wisata'] = $this->model('Wisata_model')->getAllKategoriWisata();
    $this->view('templates/header', $data);
    $this->view('wisata/edit', $data);
    $this->view('templates/footer');
  }

  public function post()
  {
    $data['tittle'] = "Admin - Tambah Kategori Wisata";
    $data['pages'] = "Wisata";
    $data['kategori_wisata'] = $this->model('Wisata_model')->getAllKategoriWisata();
    $this->view('templates/header', $data);
    $this->view('wisata/add', $data['kategori_wisata']);
    $this->view('templates/footer');
  }
  public function edit($id)
  {
    $data['tittle'] = "Admin - Ubah Kategori Wisata";
    $data['pages'] = "Wisata";
    $data['kategori_wisata'] = $this->model('Wisata_model')->getKategoriWisataById($id);
    $this->view('templates/header', $data);
    $this->view('wisata/edit_kategori', $data['kategori_wisata']);
    $this->view('templates/footer');
  }
  public function addKategoriWisata()
  {
    if ($this->model('Wisata_model')->addKategoriWisata($_POST) > 0) {
      Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'Kategori Wisata ');
      header('Location: ' . BASEURL . 'wisata/kategori');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'Kategori Wisata ');
      header('Location: ' . BASEURL . 'wisata/kategori');
      exit;
    }
  }
  public function editKategoriWisata()
  {
    if ($this->model('Wisata_model')->editKategoriWisata($_POST) > 0) {
      Flasher::setFlash('Berhasil', 'diubah', 'success', 'Kategori Wisata ');
      header('Location: ' . BASEURL . 'wisata/kategori');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'diubah', 'danger', 'Kategori Wisata ');
      header('Location: ' . BASEURL . 'wisata/kategori');
      exit;
    }
  }
  public function postWisata()
  {
    if ($this->model('Wisata_model')->postWisata([$_POST, $_FILES]) > 0) {
      Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'wisata ');
      header('Location: ' . BASEURL . 'wisata');
      exit;
    } else {
      // Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'wisata ');
      header('Location: ' . BASEURL . 'wisata');
      exit;
    }
  }
  public function editWisata()
  {
    if ($this->model('Wisata_model')->editWisata([$_POST, $_FILES]) > 0) {
      Flasher::setFlash('Berhasil', 'Diubah', 'success', 'Wisata ');
      header('Location: ' . BASEURL . 'wisata');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'Diubah', 'danger', 'Wisata ');
      header('Location: ' . BASEURL . 'wisata');
      exit;
    }
  }
  public function hapusWisata($id)
  {
    if ($this->model('Wisata_model')->hapusWisata($id) > 0) {
      Flasher::setFlash('Berhasil', 'Dihapus
          ', 'success', 'wisata ');
      header('Location: ' . BASEURL . 'wisata');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'Dihapus
          ', 'danger', 'Wisata ');
      header('Location: ' . BASEURL . 'wisata');
      exit;
    }
  }
  public function hapus($id)
  {
    if ($this->model('Wisata_model')->hapusKategoriWisata($id) > 0) {
      Flasher::setFlash('Berhasil', 'Dihapus
          ', 'success', 'Kategori wisata ');
      header('Location: ' . BASEURL . 'wisata/kategori');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'Dihapus
          ', 'danger', 'Kategori Wisata ');
      header('Location: ' . BASEURL . 'wisata/kategori');
      exit;
    }
  }
}
