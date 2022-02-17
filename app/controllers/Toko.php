<?php

class Toko extends Controller
{
  public function index()
  {
    $data['kategori_gallery'] = $this->model('Index_model')->getKategoriGallery();
    $data['produk'] = $this->model('Produk_model')->getProduk();
    $this->view('templates/header');
    $this->view('Toko/index', $data);
    $this->view('templates/footer');
  }
  // public function detail()
  // {
  //   $data['produk'] = $this->model('Produk_model')->getProduk();
  //   $this->view('templates/header');
  //   $this->view('Produk/detail', $data);
  //   $this->view('templates/footer');
  // }
}
