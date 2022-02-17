<?php

class Fasilitas extends Controller
{
  public function page($id)
  {
    $data['fasilitasById'] = $this->model('Fasilitas_model')->getFasilitasById($id);
    $data['kategori_gallery'] = $this->model('Index_model')->getKategoriGallery();
    $data['gallery'] = $this->model('Index_model')->getGallery();
    $data['fasilitas'] = $this->model('Index_model')->getFasilitas();
    $data['event'] = $this->model('Index_model')->getEvent();
    $data['wisata'] = $this->model('Index_model')->getWisata();
    $data['profil'] = $this->model('Index_model')->getProfil();
    $data['kategori_produk'] = $this->model('Index_model')->getProdukKategori();

    $data['page'] = 'Fasilitas';
    $data['title'] = 'Samarindah - ' . $data['fasilitasById']['nama_fasilitas'];
    $this->view('templates/header', $data);
    $this->view('fasilitas/index', [$data['fasilitasById'], $data['fasilitas']]);
    $this->view('templates/footer', $data);
  }
}
