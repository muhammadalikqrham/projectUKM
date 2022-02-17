<?php
class Wisata_model
{
  private $table = 'tb_wisata';
  private $linkTable = 'tb_kategori_wisata';
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }
  public function getWisataById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN ' . $this->linkTable . ' 
                        USING (id_kategori_wisata) WHERE nama = :id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }
}
