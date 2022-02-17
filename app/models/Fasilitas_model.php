<?php
class Fasilitas_model
{
  private $table = 'fasilitas';
  private $linkTable = 'kategori_fasilitas';
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }
  public function getFasilitasById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN ' . $this->linkTable . ' 
                        USING (id_kategori_fasilitas) WHERE nama_fasilitas = :id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }
}
