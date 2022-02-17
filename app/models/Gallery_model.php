<?php
class Gallery_model extends Database
{
  private $table = ['gallery', 'tb_kategori_gallery'];
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getKategoriGallery()
  {
    $this->db->query('SELECT * FROM ' . $this->table[1]);

    return $this->db->resultSet();
  }
  public function getGallery()
  {
    $this->db->query('SELECT * FROM ' . $this->table[0]);

    return $this->db->resultSet();
  }
  public function getGalleryByKategori($id)
  {
    $query = 'SELECT * FROM ' . $this->table[0] . ' INNER JOIN ' . $this->table[1] . ' USING(id_kategori_gallery) WHERE nama_kategori_gallery = :nama ';

    // var_dump($id);
    // exit;
    $this->db->query($query);
    $this->db->bind('nama', $id);


    return $this->db->resultSet();
  }
  public function paginationGallery($id)
  {
    $jumlahDataPerHalaman = 12;
    $jumlahData = count($this->getGallery());
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = $id;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

    // $query = 'SELECT * FROM ' . $this->table[0] . ' 
    // INNER JOIN ' . $this->table[1] . ' 
    // USING (' . $this->secondaryKey . ') GROUP BY id_produk LIMIT ' . $awalData . ', ' . $jumlahDataPerHalaman;

    $query = 'SELECT * FROM ' . $this->table[0] . ' LIMIT ' . $awalData . ', ' . $jumlahDataPerHalaman;

    $this->db->query($query);
    return $this->db->resultSet();
  }
  public function paginationKategoriGallery($id)
  {
    $jumlahDataPerHalaman = 12;
    $jumlahData = count($this->getGallery());
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = $id[1];
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

    // $query = 'SELECT * FROM ' . $this->table[0] . ' 
    // INNER JOIN ' . $this->table[1] . ' 
    // USING (' . $this->secondaryKey . ') GROUP BY id_produk LIMIT ' . $awalData . ', ' . $jumlahDataPerHalaman;

    $query = 'SELECT * FROM ' . $this->table[0] . ' INNER JOIN ' . $this->table[1] . ' USING(id_kategori_gallery) WHERE nama_kategori_gallery = :nama LIMIT ' . $awalData . ', ' . $jumlahDataPerHalaman;

    // var_dump($id);
    // exit;
    $this->db->query($query);
    $this->db->bind('nama', $id[0]);
    return $this->db->resultSet();
  }
}
