<?php

class Beranda extends Controller
{
    public function index()
    {
        $data['title'] = 'Samarindah - Beranda';
        $data['page'] = 'Beranda';
        $data['banner'] = $this->model('Index_model')->getBanner();
        $data['desa'] = $this->model('Index_model')->getDesaProfil();
        $data['produk'] = $this->model('Index_model')->getProduk();
        $data['kategori_produk'] = $this->model('Index_model')->getProdukKategori();
        $data['berita'] = $this->model('Index_model')->getBerita();
        $data['gallery'] = $this->model('Index_model')->getGallery();
        $data['fasilitas'] = $this->model('Index_model')->getFasilitas();
        $data['event'] = $this->model('Index_model')->getEvent();
        $data['event_hot'] = $this->model('Index_model')->getEventTerbaru();
        $data['wisata'] = $this->model('Index_model')->getWisata();
        $data['kategori_gallery'] = $this->model('Index_model')->getKategoriGallery();
        $data['profil'] = $this->model('Index_model')->getProfil();

        $this->view('templates/header', $data);
        $this->view('beranda/index', [$data['banner'], $data['desa'], $data['produk'], $data['berita'], $data['gallery'], $data['fasilitas'], $data['event'], $data['wisata'], $data['event_hot'], $data['profil'], $data['kategori_produk']]);

        $this->view('templates/footer', $data);
    }
}
