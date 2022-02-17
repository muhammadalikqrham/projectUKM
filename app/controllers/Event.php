<?php

class Event extends Controller
{
  public function page($id)
  {
    $data['eventById'] = $this->model('Event_model')->getEventById($id);
    $data['kategori_gallery'] = $this->model('Index_model')->getKategoriGallery();
    $data['gallery'] = $this->model('Index_model')->getGallery();
    $data['fasilitas'] = $this->model('Index_model')->getFasilitas();
    $data['event'] = $this->model('Index_model')->getEvent();
    $data['wisata'] = $this->model('Index_model')->getWisata();
    $data['profil'] = $this->model('Index_model')->getProfil();
    $data['kategori_produk'] = $this->model('Index_model')->getProdukKategori();

    $data['page'] = 'Event';
    $data['title'] = 'Samarindah - ' . $data['eventById']['nama_event'];
    $this->view('templates/header', $data);
    $this->view('event/index', [$data['eventById'], $data['event']]);
    $this->view('templates/footer', $data);
  }
}
