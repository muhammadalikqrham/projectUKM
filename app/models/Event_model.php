<?php
class Event_model
{
  private $table = 'event';
  private $linkTable = 'kategori_event';
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }
  public function getEventById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN ' . $this->linkTable . ' 
                        USING (id_kategori_event) WHERE nama_event = :id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }
}
