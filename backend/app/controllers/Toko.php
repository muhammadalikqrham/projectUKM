<?php

class Toko extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['username'])) {
            header('Location:' . BASEURL . 'login');
        }
    }
    public function index()
    {
        $data['tittle'] = "Admin - Toko";
        $data['pages'] = "Toko";
        $data['toko'] = $this->model('Toko_model')->getAllToko();
        $this->view('templates/header', $data);
        $this->view('toko/index', $data['toko']);
        $this->view('templates/footer');
    }
    public function tambahToko()
    {
        $data['tittle'] = "Admin - Tambah Toko";
        $data['pages'] = "Toko";
        $this->view('templates/header', $data);
        $this->view('toko/tambahToko');
        $this->view('templates/footer');
    }
    public function tambah()
    {
        if ($this->model('Toko_model')->addToko($_POST) > 0) {
            header('Location: ' . BASEURL . 'toko');
            exit;
        }
    }
}
