<?php

class Berita extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['username'])) {
            header('Location:' . BASEURL . 'login');
        }
    }
    public function index()
    {
        $data['tittle'] = "Admin - Berita";
        $data['pages'] = "Berita";
        $data['berita'] = $this->model('Berita_model')->getAllBerita();
        $this->view('templates/header', $data);
        $this->view('berita/index', $data['berita']);
        $this->view('templates/footer');
    }
    public function kategori()
    {
        $data['tittle'] = "Admin - Kategori Berita";
        $data['pages'] = "Berita";
        $data['kategori_berita'] = $this->model('Berita_model')->getAllKategoriBerita();
        $this->view('templates/header', $data);
        $this->view('berita/kategori', $data['kategori_berita']);
        $this->view('templates/footer');
    }
    public function Post()
    {
        $data['tittle'] = "Admin - Posting Berita";
        $data['pages'] = "Berita";
        $data['kategori_berita'] = $this->model('Berita_model')->getAllKategoriBerita();
        $this->view('templates/header', $data);
        $this->view('berita/postBerita', $data['kategori_berita']);
        $this->view('templates/footer');
    }
    public function tambahKategori()
    {
        $data['tittle'] = "Admin - Tambah Kategori Berita";
        $data['pages'] = "Berita";
        $this->view('templates/header', $data);
        $this->view('berita/tambah_kategori');
        $this->view('templates/footer');
    }
    public function postBerita()
    {
        if ($this->model('Berita_model')->postBerita([$_POST, $_FILES]) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'Berita ');
            header('Location: ' . BASEURL . 'berita');
            exit;
        } else {
            // Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'Berita ');
            header('Location: ' . BASEURL . 'berita');
            exit;
        }
    }
    public function addKategoriBerita()
    {
        if ($this->model('Berita_model')->addKategoriBerita($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'Kategori Berita ');
            header('Location: ' . BASEURL . 'berita/kategori');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'Kategori Berita ');
            header('Location: ' . BASEURL . 'berita/kategori');
            exit;
        }
    }
    public function edit_berita($id_berita)
    {
        $data['tittle'] = "Admin - Posting Berita";
        $data['pages'] = "Berita";
        $data['berita'] = $this->model('Berita_model')->getBerita($id_berita);
        $data['kategori_berita'] = $this->model('Berita_model')->getAllKategoriBerita();
        $this->view('templates/header', $data);
        $this->view('berita/edit_berita', [$data['berita'], $data['kategori_berita']]);
        $this->view('templates/footer');
    }
    public function editBerita()
    {
        if ($this->model('Berita_model')->editBerita([$_POST, $_FILES]) > 0) {
            Flasher::setFlash('Berhasil', 'Diubah', 'success', 'Berita ');
            header('Location: ' . BASEURL . 'berita');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Diubah', 'danger', 'Berita ');
            header('Location: ' . BASEURL . 'berita');
            exit;
        }
    }
    public function hapusBerita($id)
    {
        if ($this->model('Berita_model')->hapusBerita($id) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus
            ', 'success', 'Berita ');
            header('Location: ' . BASEURL . 'berita');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Dihapus
            ', 'danger', 'Berita ');
            header('Location: ' . BASEURL . 'berita');
            exit;
        }
    }
    public function publishBerita()
    {
        if (isset($_POST['Published'])) {
            $alert = 'Ditakedown';
        } else {
            $alert = 'Diterbitkan';
        }

        if ($this->model('Berita_model')->publishBerita($_POST) > 0) {
            Flasher::setFlash('Berhasil', $alert, 'success', 'Berita ');
            header('Location: ' . BASEURL . 'berita');
            exit;
        } else {
            Flasher::setFlash('Gagal', $alert, 'danger', 'Berita ');
            header('Location: ' . BASEURL . 'berita');
            exit;
        }
    }
    public function editKategoriBerita()
    {
        if ($this->model('berita_model')->editKategoriBerita($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diubah', 'success', 'Kategori Berita ');
            header('Location: ' . BASEURL . 'berita/kategori');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diubah', 'danger', 'Kategori Berita ');
            header('Location: ' . BASEURL . 'berita/kategori');
            exit;
        }
    }
    public function edit($id)
    {
        $data['tittle'] = "Admin - Ubah Kategori Berita";
        $data['pages'] = "Berita";
        $data['kategori_berita'] = $this->model('berita_model')->getKategoriBeritaById($id);
        $this->view('templates/header', $data);
        $this->view('berita/edit_kategori', $data['kategori_berita']);
        $this->view('templates/footer');
    }
}
