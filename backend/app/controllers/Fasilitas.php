
<?php
class Fasilitas extends Controller
{
  public function index()
  {
    $data['tittle'] = "Admin - Fasilitas";
    $data['pages'] = "Fasilitas";
    $data['fasilitas'] = $this->model('Fasilitas_model')->getAllFasilitas();
    $this->view('templates/header', $data);
    $this->view('fasilitas/index', $data['fasilitas']);
    $this->view('templates/footer');
  }
  public function kategori()
  {
    $data['tittle'] = "Admin - Fasilitas";
    $data['pages'] = "Fasilitas";
    $data['kategori_fasilitas'] = $this->model('Fasilitas_model')->getAllKategoriFasilitas();
    $this->view('templates/header', $data);
    $this->view('fasilitas/kategori', $data['kategori_fasilitas']);
    $this->view('templates/footer');
  }
  public function add()
  {
    $data['tittle'] = "Admin - Tambah Kategori Fasilitas";
    $data['pages'] = "Fasilitas";
    $this->view('templates/header', $data);
    $this->view('fasilitas/tambah_kategori');
    $this->view('templates/footer');
  }
  public function ubah($id)
  {
    $data['tittle'] = "Admin - Tambah Kategori Fasilitas";
    $data['pages'] = "Fasilitas";
    $data['fasilitas'] = $this->model('Fasilitas_model')->getFasilitasById($id);
    $data['kategori_fasilitas'] = $this->model('Fasilitas_model')->getAllKategoriFasilitas();
    $this->view('templates/header', $data);
    $this->view('fasilitas/edit', $data);
    $this->view('templates/footer');
  }

  public function post()
  {
    $data['tittle'] = "Admin - Tambah Kategori Fasilitas";
    $data['pages'] = "Fasilitas";
    $data['kategori_fasilitas'] = $this->model('Fasilitas_model')->getAllKategoriFasilitas();
    $this->view('templates/header', $data);
    $this->view('fasilitas/add', $data['kategori_fasilitas']);
    $this->view('templates/footer');
  }
  public function edit($id)
  {
    $data['tittle'] = "Admin - Ubah Kategori Fasilitas";
    $data['pages'] = "Fasilitas";
    $data['kategori_fasilitas'] = $this->model('Fasilitas_model')->getKategoriFasilitasById($id);
    $this->view('templates/header', $data);
    $this->view('fasilitas/edit_kategori', $data['kategori_fasilitas']);
    $this->view('templates/footer');
  }
  public function addKategoriFasilitas()
  {
    if ($this->model('Fasilitas_model')->addKategoriFasilitas($_POST) > 0) {
      Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'Kategori Fasilitas ');
      header('Location: ' . BASEURL . 'fasilitas/kategori');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'Kategori Fasilitas ');
      header('Location: ' . BASEURL . 'fasilitas/kategori');
      exit;
    }
  }
  public function editKategoriFasilitas()
  {
    if ($this->model('Fasilitas_model')->editKategoriFasilitas($_POST) > 0) {
      Flasher::setFlash('Berhasil', 'diubah', 'success', 'Kategori Fasilitas ');
      header('Location: ' . BASEURL . 'fasilitas/kategori');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'diubah', 'danger', 'Kategori Fasilitas ');
      header('Location: ' . BASEURL . 'fasilitas/kategori');
      exit;
    }
  }
  public function postFasilitas()
  {
    if ($this->model('Fasilitas_model')->postFasilitas([$_POST, $_FILES]) > 0) {
      Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'fasilitas ');
      header('Location: ' . BASEURL . 'fasilitas');
      exit;
    } else {
      // Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'fasilitas ');
      header('Location: ' . BASEURL . 'fasilitas');
      exit;
    }
  }
  public function editFasilitas()
  {
    if ($this->model('Fasilitas_model')->editFasilitas([$_POST, $_FILES]) > 0) {
      Flasher::setFlash('Berhasil', 'Diubah', 'success', 'Fasilitas ');
      header('Location: ' . BASEURL . 'fasilitas');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'Diubah', 'danger', 'Fasilitas ');
      header('Location: ' . BASEURL . 'fasilitas');
      exit;
    }
  }
  public function hapusFasilitas($id)
  {
    if ($this->model('Fasilitas_model')->hapusFasilitas($id) > 0) {
      Flasher::setFlash('Berhasil', 'Dihapus
          ', 'success', 'Fasilitas ');
      header('Location: ' . BASEURL . 'fasilitas');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'Dihapus
          ', 'danger', 'Fasilitas ');
      header('Location: ' . BASEURL . 'fasilitas');
      exit;
    }
  }
  public function hapus($id)
  {
    if ($this->model('Fasilitas_model')->hapusKategoriFasilitas($id) > 0) {
      Flasher::setFlash('Berhasil', 'Dihapus
          ', 'success', 'Kategori Fasilitas ');
      header('Location: ' . BASEURL . 'fasilitas/kategori');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'Dihapus
          ', 'danger', 'Kategori Fasilitas ');
      header('Location: ' . BASEURL . 'fasilitas/kategori');
      exit;
    }
  }
}
