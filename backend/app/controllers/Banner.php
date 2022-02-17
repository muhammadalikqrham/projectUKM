<?php

class Banner extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['username'])) {
            header('Location:' . BASEURL . 'login');
            exit;
        }
    }
    public function index()
    {
        $data['tittle'] = "Admin - Banner";
        $data['pages'] = "Banner";
        $data['banner'] = $this->model('Banner_model')->getAllBanner();
        $this->view('templates/header', $data);
        $this->view('banner/index', $data['banner']);
        $this->view('templates/footer');
    }
    public function add()
    {
        $data['tittle'] = "Admin - Banner";
        $data['pages'] = "Banner";
        $this->view('templates/header', $data);
        $this->view('banner/postBanner');
        $this->view('templates/footer');
    }

    public function postBanner()
    {

        if ($this->model('Banner_model')->postBanner([$_POST, $_FILES]) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'Banner ');
            header('Location: ' . BASEURL . 'banner');
            exit;
        } else {
            // Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'Berita ');
            header('Location: ' . BASEURL . 'banner');
            exit;
        }
    }
    public function publishBanner()
    {
        if (isset($_POST['Published'])) {
            $alert = 'Diterbitkan';
        } else {
            $alert = 'Ditakedown';
        }

        if ($this->model('Banner_model')->publishBanner($_POST) > 0) {
            Flasher::setFlash('Berhasil', $alert, 'success', 'Banner ');
            header('Location: ' . BASEURL . 'Banner');
            exit;
        } else {
            Flasher::setFlash('Gagal', $alert, 'danger', 'Banner ');
            header('Location: ' . BASEURL . 'Banner');
            exit;
        }
    }
    public function hapus()
    {

        if ($this->model('Banner_model')->hapusBanner($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success', 'Banner ');
            header('Location: ' . BASEURL . 'Banner');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Dihapus', 'danger', 'Banner ');
            header('Location: ' . BASEURL . 'Banner');
            exit;
        }
    }
}
