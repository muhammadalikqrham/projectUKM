
<?php
class Event extends Controller
{
  public function index()
  {
    $data['tittle'] = "Admin - Event";
    $data['pages'] = "Event";
    $data['event'] = $this->model('Event_model')->getAllEvent();
    $this->view('templates/header', $data);
    $this->view('event/index', $data['event']);
    $this->view('templates/footer');
  }
  public function kategori()
  {
    $data['tittle'] = "Admin - Event";
    $data['pages'] = "Event";
    $data['kategori_event'] = $this->model('Event_model')->getAllKategoriEvent();
    $this->view('templates/header', $data);
    $this->view('event/kategori', $data['kategori_event']);
    $this->view('templates/footer');
  }
  public function add()
  {
    $data['tittle'] = "Admin - Tambah Kategori Event";
    $data['pages'] = "Event";
    $this->view('templates/header', $data);
    $this->view('event/tambah_kategori');
    $this->view('templates/footer');
  }
  public function ubah($id)
  {
    $data['tittle'] = "Admin - Tambah Kategori Event";
    $data['pages'] = "Event";
    $data['event'] = $this->model('Event_model')->getEventById($id);
    $data['kategori_event'] = $this->model('Event_model')->getAllKategoriEvent();
    $this->view('templates/header', $data);
    $this->view('event/edit', $data);
    $this->view('templates/footer');
  }

  public function post()
  {
    $data['tittle'] = "Admin - Tambah Kategori Event";
    $data['pages'] = "Event";
    $data['kategori_event'] = $this->model('Event_model')->getAllKategoriEvent();
    $this->view('templates/header', $data);
    $this->view('event/add', $data['kategori_event']);
    $this->view('templates/footer');
  }
  public function edit($id)
  {
    $data['tittle'] = "Admin - Ubah Kategori Event";
    $data['pages'] = "Event";
    $data['kategori_event'] = $this->model('Event_model')->getKategoriEventById($id);
    $this->view('templates/header', $data);
    $this->view('event/edit_kategori', $data['kategori_event']);
    $this->view('templates/footer');
  }
  public function addKategoriEvent()
  {
    if ($this->model('Event_model')->addKategoriEvent($_POST) > 0) {
      Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'Kategori Event ');
      header('Location: ' . BASEURL . 'event/kategori');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'Kategori Event ');
      header('Location: ' . BASEURL . 'event/kategori');
      exit;
    }
  }
  public function editKategoriEvent()
  {
    if ($this->model('Event_model')->editKategoriEvent($_POST) > 0) {
      Flasher::setFlash('Berhasil', 'diubah', 'success', 'Kategori Event ');
      header('Location: ' . BASEURL . 'event/kategori');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'diubah', 'danger', 'Kategori Event ');
      header('Location: ' . BASEURL . 'event/kategori');
      exit;
    }
  }
  public function postEvent()
  {
    if ($this->model('Event_model')->postEvent([$_POST, $_FILES]) > 0) {
      Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'Event ');
      header('Location: ' . BASEURL . 'event');
      exit;
    } else {
      // Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'Event ');
      header('Location: ' . BASEURL . 'event');
      exit;
    }
  }
  public function editEvent()
  {
    if ($this->model('Event_model')->editEvent([$_POST, $_FILES]) > 0) {
      Flasher::setFlash('Berhasil', 'Diubah', 'success', 'Event ');
      header('Location: ' . BASEURL . 'event');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'Diubah', 'danger', 'Event ');
      header('Location: ' . BASEURL . 'event');
      exit;
    }
  }
  public function hapusEvent($id)
  {
    if ($this->model('Event_model')->hapusEvent($id) > 0) {
      Flasher::setFlash('Berhasil', 'Dihapus
          ', 'success', 'Event ');
      header('Location: ' . BASEURL . 'event');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'Dihapus
          ', 'danger', 'Event ');
      header('Location: ' . BASEURL . 'event');
      exit;
    }
  }
  public function hapus($id)
  {
    if ($this->model('Event_model')->hapusKategoriEvent($id) > 0) {
      Flasher::setFlash('Berhasil', 'Dihapus
          ', 'success', 'Kategori Event ');
      header('Location: ' . BASEURL . 'event/kategori');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'Dihapus
          ', 'danger', 'Kategori Event ');
      header('Location: ' . BASEURL . 'event/kategori');
      exit;
    }
  }
}
