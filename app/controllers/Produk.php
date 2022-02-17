<?php

class Produk extends Controller
{
  public function index($id = 1)
  {
    $jumlahDataPerHalaman = 12;
    $jumlahData = count($this->model('Produk_model')->getProduk());
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    if ($id > $jumlahHalaman) {
      $id = $jumlahHalaman;
    }
    $data['produk'] = $this->model('Produk_model')->paginationProduk($id);
    $data['kategori_produk'] = $this->model('Produk_model')->getKategori();
    $data['banner'] = $this->model('Produk_model')->getBanner();
    $data['page'] = 'Produk';
    $data['title'] = 'Samarindah - Produk';
    $data['kategori_gallery'] = $this->model('Index_model')->getKategoriGallery();
    $data['fasilitas'] = $this->model('Index_model')->getFasilitas();
    $data['event'] = $this->model('Index_model')->getEvent();
    $data['wisata'] = $this->model('Index_model')->getWisata();
    $data['profil'] = $this->model('Index_model')->getProfil();
    $this->view('templates/header', $data);
    $this->view('produk/index', [$data['produk'], $data['kategori_produk'], $data['banner'], $jumlahHalaman, $id]);
    $this->view('templates/footer', $data);
  }
  public function kategori($nama, $id = 1)
  {
    $nama = $_GET['url'];
    $nama = explode('/', $nama);
    $nama = end($nama);
    $data['produk'] = $this->model('Produk_model')->paginationKategori([$nama, $id]);
    $data['kategori_produk'] = $this->model('Produk_model')->getKategori();
    // $nama = str_replace(' ', '%20', $nama);
    // var_dump(urldecode($nama));
    // foreach ($data['kategori_produk'] as $item) :
    //   if (str_replace(' ', '', strtolower($item['nama_kategori_produk'])) == strtolower($nama)) {
    //     $kategori = ucwords($item['nama_kategori_produk']);
    //   }
    // endforeach;
    $jumlahData = count($this->model('Produk_model')->getProdukByKategori($nama));
    $jumlahDataPerHalaman = 12;
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    if ($id > $jumlahHalaman) {
      $id = $jumlahHalaman;
    }
    $data['page'] = 'Produk';
    $data['title'] = 'Samarindah - ' . ucwords($nama);
    $data['banner'] = $this->model('Produk_model')->getBanner();
    $data['kategori_gallery'] = $this->model('Index_model')->getKategoriGallery();
    $data['fasilitas'] = $this->model('Index_model')->getFasilitas();
    $data['event'] = $this->model('Index_model')->getEvent();
    $data['wisata'] = $this->model('Index_model')->getWisata();
    $data['profil'] = $this->model('Index_model')->getProfil();
    $this->view('templates/header', $data);
    $this->view('produk/kategori', [$data['produk'], $data['kategori_produk'], $data['banner'], ucwords($nama), $jumlahHalaman, $id]);
    $this->view('templates/footer', $data);
  }
}
