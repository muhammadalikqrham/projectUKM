<?php

class Berita_model
{
  private $table = 'berita';
  private $linkTable = 'kategori_berita';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getBerita()
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN ' . $this->linkTable . ' 
                        USING (id_kategori_berita) WHERE status = "Published" group by tanggal_upload DESC limit 5');
    return $this->db->resultSet();
  }

  public function getDetailBerita($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN ' . $this->linkTable . ' 
                        USING (id_kategori_berita) 
                        WHERE id_berita=:id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }
  public function beritaTerbaru()
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN ' . $this->linkTable . ' 
                        USING (id_kategori_berita) WHERE status = "Published" group by tanggal_upload DESC LIMIT 1');

    return $this->db->single();
  }
}
