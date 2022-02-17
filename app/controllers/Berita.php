<?php

class Berita extends Controller
{
    public function index()
    {
        $data['title'] = 'Samarindah - Berita';
        $data['page'] = 'Berita';
        $data['beritaTerbaru'] = $this->model('Berita_model')->beritaTerbaru();
        $data['berita'] = $this->model('Berita_model')->getBerita();
        $data['kategori_gallery'] = $this->model('Index_model')->getKategoriGallery();
        $data['kategori_produk'] = $this->model('Index_model')->getProdukKategori();
        $data['fasilitas'] = $this->model('Index_model')->getFasilitas();
        $data['event'] = $this->model('Index_model')->getEvent();
        $data['wisata'] = $this->model('Index_model')->getWisata();
        $data['profil'] = $this->model('Index_model')->getProfil();
        $this->view('templates/header', $data);
        $this->view('Berita/index', [$data['berita'], $data['beritaTerbaru']]);
        $this->view('templates/footer', $data);
    }
    public function page($id)
    {
        $data['berita'] = $this->model('Berita_model')->getDetailBerita($id);
        $data['recom_berita'] = $this->model('Berita_model')->getBerita();
        $data['kategori_gallery'] = $this->model('Index_model')->getKategoriGallery();
        $data['kategori_produk'] = $this->model('Index_model')->getProdukKategori();
        $data['fasilitas'] = $this->model('Index_model')->getFasilitas();
        $data['event'] = $this->model('Index_model')->getEvent();
        $data['wisata'] = $this->model('Index_model')->getWisata();
        $data['profil'] = $this->model('Index_model')->getProfil();
        $data['kategori_produk'] = $this->model('Index_model')->getProdukKategori();
        $data['page'] = 'Berita';
        $data['title'] = 'Samarindah - ' . $data['berita']['judul'];
        $this->view('templates/header', $data);
        $this->view('Berita/page', [$data['berita'], $data['recom_berita']]);
        $this->view('templates/footer', $data);
    }
}
