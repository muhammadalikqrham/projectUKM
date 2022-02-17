<?php

class Wisata extends Controller
{
  public function page($id)
  {
    $data['wisataById'] = $this->model('Wisata_model')->getWisataById($id);
    $data['kategori_gallery'] = $this->model('Index_model')->getKategoriGallery();
    $data['gallery'] = $this->model('Index_model')->getGallery();
    $data['fasilitas'] = $this->model('Index_model')->getFasilitas();
    $data['event'] = $this->model('Index_model')->getEvent();
    $data['wisata'] = $this->model('Index_model')->getWisata();
    $data['profil'] = $this->model('Index_model')->getProfil();
    $data['kategori_produk'] = $this->model('Index_model')->getProdukKategori();

    $data['page'] = 'Wisata';
    $data['title'] = 'Samarindah - ' . $data['wisataById']['nama'];
    $this->view('templates/header', $data);
    $this->view('wisata/index', [$data['wisataById'], $data['wisata']]);
    $this->view('templates/footer', $data);
  }
}
