<?php

class Gallery extends Controller
{
  public function index($id = 1)
  {
    $jumlahDataPerHalaman = 12;
    $jumlahData = count($this->model('Gallery_model')->getGallery());
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    if ($id > $jumlahHalaman) {
      $id = $jumlahHalaman;
    }
    $data['title'] = 'Samarindah - Gallery';
    $data['page'] = 'Gallery';
    $data['kategori_gallery'] = $this->model('Index_model')->getKategoriGallery();
    $data['gallery'] = $this->model('Gallery_model')->paginationGallery($id);
    $data['banner'] = $this->model('Produk_model')->getBanner();
    $data['fasilitas'] = $this->model('Index_model')->getFasilitas();
    $data['event'] = $this->model('Index_model')->getEvent();
    $data['wisata'] = $this->model('Index_model')->getWisata();
    $data['profil'] = $this->model('Index_model')->getProfil();
    $data['kategori_produk'] = $this->model('Index_model')->getProdukKategori();

    // $data['galleryByKategori'] = $this->model('Index_model')->getGalleryByKategori($id);
    $this->view('templates/header', $data);
    $this->view('gallery/index', [$data, $jumlahHalaman, $id]);
    $this->view('templates/footer', $data);
  }
  public function kategori($nama, $id = 1)
  {
    // // $nama = $_GET['url'];
    // // $nama = explode('/', $nama);
    // // $nama = end($nama);
    // echo $nama;
    $data['gallery'] = $this->model('Gallery_model')->paginationKategoriGallery([$nama, $id]);
    $data['kategori_gallery'] = $this->model('Index_model')->getKategoriGallery();
    // $nama = str_replace(' ', '%20', $nama);
    // var_dump(urldecode($nama));
    // var_dump($nama);
    // foreach ($data['kategori_produk'] as $item) :
    //   if (str_replace(' ', '', strtolower($item['nama_kategori_produk'])) == strtolower($nama)) {
    //     $kategori = ucwords($item['nama_kategori_produk']);
    //   }
    // endforeach;
    $jumlahData = count($this->model('Gallery_model')->getGalleryByKategori($nama));
    $jumlahDataPerHalaman = 12;
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    if ($id > $jumlahHalaman) {
      $id = $jumlahHalaman;
    }
    $data['page'] = 'Gallery';
    $data['title'] = 'Samarindah - ' . ucwords($nama);
    $data['banner'] = $this->model('Produk_model')->getBanner();
    $data['kategori_gallery'] = $this->model('Index_model')->getKategoriGallery();
    $data['fasilitas'] = $this->model('Index_model')->getFasilitas();
    $data['event'] = $this->model('Index_model')->getEvent();
    $data['wisata'] = $this->model('Index_model')->getWisata();
    $data['profil'] = $this->model('Index_model')->getProfil();
    $data['kategori_produk'] = $this->model('Index_model')->getProdukKategori();

    $this->view('templates/header', $data);
    $this->view('gallery/kategori', [$data, $jumlahHalaman, $id, $nama]);
    $this->view('templates/footer', $data);
  }
}
