<?php

class Index_model extends Database
{
  private $table = ['banner', 'berita', 'gallery', 'produk', 'tb_profil', 'tb_kategori_gallery', 'fasilitas', 'tb_wisata', 'event', 'tb_profil'];
  private $linkTable = ['kategori_berita', 'kategori_produk', 'kategori_fasilitas', 'kategori_event', 'tb_kategori_wisata'];
  private $secondaryKey = 'id_kategori_produk';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getProdukKategori()
  {
    $this->db->query('SELECT * FROM ' . $this->linkTable[1]);

    return $this->db->resultSet();
  }
  public function getBanner()
  {
    $this->db->query('SELECT * FROM ' . $this->table[0] . ' WHERE status ="Published"');

    return $this->db->resultSet();
  }

  public function getDesaProfil()
  {
    $profil = "Profil";
    $this->db->query('SELECT * FROM ' . $this->table[4] . ' WHERE Kategori = :profil');
    $this->db->bind('profil', $profil);

    return $this->db->single();
  }

  public function getProduk()
  {
    $this->db->query('SELECT * FROM ' . $this->table[3] . ' 
                    INNER JOIN ' . $this->linkTable[1] . ' 
                    USING (' . $this->secondaryKey . ')');

    return $this->db->resultSet();
  }

  public function getBerita()
  {
    $this->db->query('SELECT * FROM ' . $this->table[1] . ' ORDER BY tanggal_upload DESC LIMIT 10 ');

    return $this->db->resultSet();
  }

  public function getGallery()
  {
    $this->db->query('SELECT * FROM ' . $this->table[2] . ' GROUP BY id_gallery DESC LIMIT 9');

    return $this->db->resultSet();
  }
  public function getFasilitas()
  {
    $this->db->query('SELECT * FROM ' . $this->table[6] . ' INNER JOIN ' . $this->linkTable[2] . ' 
                        USING (id_kategori_fasilitas) GROUP BY fasilitas.id_fasilitas DESC');
    // $this->db->bind('id', $id);
    return $this->db->resultSet();
  }
  public function getEvent()
  {
    $this->db->query('SELECT * FROM ' . $this->table[8] . ' INNER JOIN ' . $this->linkTable[3] . ' 
    USING (id_kategori_event) GROUP BY event.id_event DESC');
    // $this->db->bind('id', $id);
    return $this->db->resultSet();
  }
  public function getEventTerbaru()
  {
    $this->db->query('SELECT * FROM ' . $this->table[8] . ' INNER JOIN ' . $this->linkTable[3] . ' 
    USING (id_kategori_event) GROUP BY event.id_event DESC Limit 4');
    // $this->db->bind('id', $id);
    return $this->db->resultSet();
  }
  public function getWisata()
  {
    $this->db->query('SELECT * FROM ' . $this->table[7] . ' INNER JOIN ' . $this->linkTable[4] . ' 
    USING (id_kategori_wisata) GROUP BY tb_wisata.id_wisata DESC');
    // $this->db->bind('id', $id);
    return $this->db->resultSet();
  }
  public function getKategoriGallery()
  {
    $this->db->query('SELECT * FROM ' . $this->table[5]);

    return $this->db->resultSet();
  }
  public function getProfil()
  {
    $this->db->query('SELECT * FROM ' . $this->table[9]);
    return $this->db->resultSet();
  }
}
