<?php

class Gallery extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['username'])) {
            header('Location:' . BASEURL . 'login');
        }
    }
    public function index()
    {
        $data['tittle'] = "Admin - Gallery";
        $data['pages'] = "Gallery";
        $data['gallery'] = $this->model('Gallery_model')->getAllGallery();
        $this->view('templates/header', $data);
        $this->view('gallery/index', $data['gallery']);
        $this->view('templates/footer');
    }
    public function kategori()
    {
        $data['tittle'] = "Admin - Kategori Gallery";
        $data['pages'] = "Gallery";
        $data['gallery'] = $this->model('Gallery_model')->get_kategory();
        $this->view('templates/header', $data);
        $this->view('gallery/kategori', $data['gallery']);
        $this->view('templates/footer');
    }
    public function add()
    {
        $data['tittle'] = "Admin - Gallery";
        $data['pages'] = "Gallery";
        $data['gallery'] = $this->model('Gallery_model')->get_kategory();
        $this->view('templates/header', $data);
        $this->view('gallery/postGallery', $data['gallery']);
        $this->view('templates/footer');
    }

    public function postGallery()
    {
        if ($this->model('Gallery_model')->postGallery([$_POST, $_FILES]) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'Gallery ');
            header('Location: ' . BASEURL . 'gallery');
            exit;
        } else {
            // Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'Berita ');
            header('Location: ' . BASEURL . 'gallery');
            exit;
        }
    }
    public function hapusFoto($id)
    {
        if ($this->model('Gallery_model')->hapusFoto($id) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success', 'Gallery ');
            header('Location: ' . BASEURL . 'gallery');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger', 'Berita ');
            header('Location: ' . BASEURL . 'gallery');
            exit;
        }
    }
    public function addKategory()
    {
        if ($this->model('Gallery_model')->addKategoriGallery($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambah', 'success', 'Gallery ');
            header('Location: ' . BASEURL . 'gallery/kategori');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambah', 'danger', 'Gallery ');
            header('Location: ' . BASEURL . 'gallery/kategori');
            exit;
        }
    }
    public function editKategory()
    {
        if ($this->model('Gallery_model')->editKategoriGallery($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diubah', 'success', 'Kategori Gallery ');
            header('Location: ' . BASEURL . 'gallery/kategori');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diubah', 'danger', 'Kategori Gallery ');
            header('Location: ' . BASEURL . 'gallery/kategori');
            exit;
        }
    }
    public function deleteKategory($id)
    {
        if ($this->model('Gallery_model')->hapusKategoriGallery($id) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success', 'Kategori Gallery ');
            header('Location: ' . BASEURL . 'gallery/kategori');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger', 'Kategori Gallery ');
            header('Location: ' . BASEURL . 'gallery/kategori');
            exit;
        }
    }
    // public function publishBanner()
    // {
    //     if (isset($_POST['Published'])) {
    //         $alert = 'Diterbitkan';
    //     } else {
    //         $alert = 'Ditakedown';
    //     }

    //     if ($this->model('Banner_model')->publishBanner($_POST) > 0) {
    //         Flasher::setFlash('Berhasil', $alert, 'success', 'Banner ');
    //         header('Location: ' . BASEURL . 'Banner');
    //         exit;
    //     } else {
    //         Flasher::setFlash('Gagal', $alert, 'danger', 'Banner ');
    //         header('Location: ' . BASEURL . 'Banner');
    //         exit;
    //     }
    // }
}
