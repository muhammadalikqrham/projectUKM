<?php

class Profil extends Controller
{
  public function page($id)
  {
    $data['profilById'] = $this->model('Profil_model')->getProfilById($id);
    $data['profil'] = $this->model('Index_model')->getProfil();
    $data['kategori_gallery'] = $this->model('Index_model')->getKategoriGallery();
    $data['gallery'] = $this->model('Index_model')->getGallery();
    $data['fasilitas'] = $this->model('Index_model')->getFasilitas();
    $data['event'] = $this->model('Index_model')->getEvent();
    $data['wisata'] = $this->model('Index_model')->getWisata();
    $data['berita'] = $this->model('Index_model')->getBerita();
    $data['kategori_produk'] = $this->model('Index_model')->getProdukKategori();

    $data['page'] = 'Profil';
    $data['title'] = 'Samarindah - ' . $data['profilById']['Kategori'];
    $this->view('templates/header', $data);
    $this->view('profil/index', [$data['profilById'], $data['berita']]);
    $this->view('templates/footer', $data);
  }
}
