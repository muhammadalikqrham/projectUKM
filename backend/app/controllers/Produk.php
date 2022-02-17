<?php

class Produk extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['username'])) {
            header('Location:' . BASEURL . 'login');
        }
    }
    public function index()
    {
        $data['tittle'] = "Admin - Produk";
        $data['pages'] = "Produk";
        $data['produk'] = $this->model('Produk_model')->getAllProduk();
        $this->view('templates/header', $data);
        $this->view('produk/index', $data['produk']);
        $this->view('templates/footer');
    }
    public function kategori()
    {
        $data['tittle'] = "Admin - Kategori Produk";
        $data['pages'] = "Produk";
        $data['kategori_produk'] = $this->model('Produk_model')->getAllKategori();
        $this->view('templates/header', $data);
        $this->view('produk/kategori', $data['kategori_produk']);
        $this->view('templates/footer');
    }
    public function add_kategori()
    {
        $data['tittle'] = "Admin - Kategori Produk";
        $data['pages'] = "Produk";
        $this->view('templates/header', $data);
        $this->view('produk/add_kategori');
        $this->view('templates/footer');
    }
    public function add()
    {
        $data['tittle'] = "Admin - Kategori Produk";
        $data['pages'] = "Produk";
        $data['kategori_produk'] = $this->model('Produk_model')->getAllKategori();
        $this->view('templates/header', $data);
        $this->view('produk/add', $data['kategori_produk']);
        $this->view('templates/footer');
    }
    public function edit($id)
    {
        $data['tittle'] = "Admin - Kategori Produk";
        $data['pages'] = "Produk";
        $data['kategori_produk'] = $this->model('Produk_model')->getAllKategori();
        $data['produk'] = $this->model('Produk_model')->getProduk($id);
        $this->view('templates/header', $data);
        $this->view('produk/edit_produk', [$data['kategori_produk'], $data['produk']]);
        $this->view('templates/footer');
    }
    public function hapus($id)
    {
        if ($this->model('Produk_model')->hapus_produk($id) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success', 'Produk');
            header('Location: ' . BASEURL . 'produk');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger', 'Produk');
            header('Location: ' . BASEURL . 'produk');
            exit;
        }
    }
    public function add_kategori_produk()
    {

        if ($this->model('Produk_model')->add_kategori_produk($_POST) > 0) {
            header('Location: ' . BASEURL . 'produk/kategori');
            exit;
        }
    }
    public function tambah_produk()
    {

        if ($this->model('Produk_model')->add_produk([$_POST, $_FILES]) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'Produk');
            header('Location: ' . BASEURL . 'produk');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'Produks ');
            header('Location: ' . BASEURL . 'produk');
            exit;
        }
    }
    public function edit_produk()
    {

        if ($this->model('Produk_model')->edit_produk([$_POST, $_FILES]) > 0) {
            Flasher::setFlash('Berhasil', 'diubah', 'success', 'Produk');
            header('Location: ' . BASEURL . 'produk');
            exit;
        } else {
            header('Location: ' . BASEURL . 'produk');
            exit;
        }
    }
}
