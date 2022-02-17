<?php
class Profil_model
{
  private $table = 'tb_profil';
  // private $linkTable = 'kategori_event';
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }
  public function getProfilById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE Kategori = :id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }
}
