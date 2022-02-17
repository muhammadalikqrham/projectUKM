<?php

class Toko_model
{
  private $table = 'toko';
  // private $linkTable = 'toko';
  // private $linkTable2 = 'kategori_produk';

  // private $primaryLink = 'id_toko';
  // private $primary = "id_produk";
  // private $secondaryLink = 'id_kategori_produk';

  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllToko()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }
  public function addToko($data)
  {
    $query = 'INSERT INTO ' . $this->table .
      ' VALUES (null,:nama,:deskripsi,"asadssd.jpg",:alamat,:kontak,:fb,:ig)';

    $this->db->query($query);

    $this->db->bind("nama", $data['nama_toko']);
    $this->db->bind("deskripsi", $data['deskripsi']);
    $this->db->bind("alamat", $data['alamat']);
    $this->db->bind("kontak", $data['kontak']);
    $this->db->bind("fb", $data['fb']);
    $this->db->bind("ig", $data['ig']);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
