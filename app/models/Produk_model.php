<?php

class Produk_model
{
  private $table = ['produk', 'kategori_produk', 'banner'];
  private $linkTable = 'toko';
  private $primaryLink = 'id_toko';
  private $primary = "id_produk";
  private $secondaryKey = 'id_kategori_produk';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getProduk()
  {
    $this->db->query('SELECT * FROM ' . $this->table[0] . ' 
    INNER JOIN ' . $this->table[1] . ' 
    USING (' . $this->secondaryKey . ')');
    return $this->db->resultSet();
  }
  public function getProdukByKategori($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table[0] . ' 
    INNER JOIN ' . $this->table[1] . ' 
    USING (' . $this->secondaryKey . ') WHERE nama_kategori_produk = :id');

    $this->db->bind('id', $id);
    return $this->db->resultSet();
  }

  public function getKategori()
  {
    $this->db->query('SELECT * FROM ' . $this->table[1]);

    return $this->db->resultSet();
  }


  public function getBanner()
  {
    $this->db->query('SELECT * FROM ' . $this->table[2]);

    return $this->db->resultSet();
  }
  public function paginationProduk($id)
  {
    $jumlahDataPerHalaman = 12;
    $jumlahData = count($this->getProduk());
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = $id;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

    $query = 'SELECT * FROM ' . $this->table[0] . ' 
    INNER JOIN ' . $this->table[1] . ' 
    USING (' . $this->secondaryKey . ') GROUP BY id_produk LIMIT ' . $awalData . ', ' . $jumlahDataPerHalaman;

    $this->db->query($query);
    return $this->db->resultSet();
  }
  public function paginationKategori($id)
  {
    // var_dump($id);
    // exit;
    $jumlahDataPerHalaman = 12;
    $jumlahData = count($this->getProdukByKategori($id[0]));
    // $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = $id[1];
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

    $this->db->query('SELECT * FROM ' . $this->table[0] . ' 
    INNER JOIN ' . $this->table[1] . ' 
    USING (' . $this->secondaryKey . ') WHERE nama_kategori_produk = :id GROUP BY id_produk LIMIT ' . $awalData . ', ' . $jumlahDataPerHalaman);

    $this->db->bind('id', $id[0]);
    return $this->db->resultSet();
    // return $this->db->resultSet();
  }
}
