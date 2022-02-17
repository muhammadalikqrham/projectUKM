<?php

class Profil extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['username'])) {
            header('Location:' . BASEURL . 'login');
        }
    }
    public function index()
    {
        $data['tittle'] = "Admin - Profil";
        $data['pages'] = "Profil";
        $data['profil'] = $this->model('Profil_model')->getProfil();
        $this->view('templates/header', $data);
        $this->view('profil/index', $data['profil']);
        $this->view('templates/footer');
    }
    public function add()
    {
        $data['tittle'] = "Admin - Profil";
        $data['pages'] = "Profil";
        // $data['profil'] = $this->model('Profil_model')->getProfil();
        $this->view('templates/header', $data);
        $this->view('profil/add');
        $this->view('templates/footer');
    }
    public function edit($id)
    {
        $data['tittle'] = "Admin - Profil";
        $data['pages'] = "Profil";
        $data['profil'] = $this->model('Profil_model')->getProfilById($id);
        $this->view('templates/header', $data);
        $this->view('profil/edit_profil', $data['profil']);
        $this->view('templates/footer');
    }
    public function postProfil()
    {
        if ($this->model('Profil_model')->postProfil([$_POST, $_FILES]) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'Profil ');
            header('Location: ' . BASEURL . 'profil');
            exit;
        } else {
            // Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'profil ');
            header('Location: ' . BASEURL . 'profil');
            exit;
        }
    }

    public function editProfil()
    {
        if ($this->model('Profil_model')->edit([$_POST, $_FILES]) > 0) {
            Flasher::setFlash('Berhasil', 'Diubah', 'success', 'Profil ');
            header('Location: ' . BASEURL . 'profil');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Diubah', 'danger', 'Profil ');
            header('Location: ' . BASEURL . 'profil');
            exit;
        }
    }
    public function hapusProfil($id)
    {
        if ($this->model('Profil_model')->hapusProfil($id) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus
            ', 'success', 'Profil ');
            header('Location: ' . BASEURL . 'profil');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Dihapus
            ', 'danger', 'Profil ');
            header('Location: ' . BASEURL . 'profil');
            exit;
        }
    }
}
