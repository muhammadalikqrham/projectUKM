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
                        USING (id_kategori_fasilitas) WHERE id_fasilitas = :id GROUP BY fasilitas.id_fasilitas DESC');
    $this->db->bind('id', $id);
    return $this->db->single();
  }
  public function getAllFasilitas()
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN ' . $this->linkTable . ' 
                        USING (id_kategori_fasilitas) GROUP BY fasilitas.id_fasilitas DESC');
    // $this->db->bind('id', $id);
    return $this->db->resultSet();
  }
  public function getAllKategoriFasilitas()
  {
    $this->db->query('SELECT * FROM '  . $this->linkTable);
    // $this->db->bind('id', $id);
    return $this->db->resultSet();
  }
  public function getKategoriFasilitasById($data)
  {
    $this->db->query('SELECT * FROM '  . $this->linkTable . ' WHERE id_kategori_fasilitas = :id');

    $this->db->bind('id', $data);
    return $this->db->single();
    // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_produk = :id_produk');

    // $this->db->bind('id_produk', $data);
  }
  public function addKategoriFasilitas($data)
  {
    $query = 'INSERT INTO ' . $this->linkTable .
      ' VALUES (null,:kategori)';

    $this->db->query($query);

    $this->db->bind("kategori", $data['kategori']);
    $this->db->execute();

    return $this->db->rowCount();
  }
  public function editKategoriFasilitas($data)
  {
    $query = 'UPDATE ' . $this->linkTable .
      ' SET nama_kategori_fasilitas =  :kategori WHERE id_kategori_fasilitas = :id';

    $this->db->query($query);

    $this->db->bind("kategori", $data['kategori']);
    $this->db->bind("id", $data['id']);
    $this->db->execute();

    return $this->db->rowCount();
  }
  public function postFasilitas($data)
  {
    var_dump($data);
    $gambar = $this->upload($data);
    if (!$gambar) {
      return false;
    }

    $query = 'INSERT INTO ' . $this->table .
      ' VALUES (null,:kategori,:nama,:konten,:gambar)';

    $this->db->query($query);
    $this->db->bind('nama', $data[0]['nama']);
    $this->db->bind('kategori', $data[0]['kategori']);
    $this->db->bind('konten', $data[0]['konten']);
    $this->db->bind('gambar', $gambar);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function editFasilitas($data)
  {
    // var_dump($data);
    // exit;
    $gambar = $this->uploadUbah($data);
    if (!$gambar) {
      return false;
    } elseif ($gambar === 4) {
      $gambar = $data[0]['gambar'];
    }

    $query = 'UPDATE ' . $this->table .
      ' SET nama_fasilitas = :nama, id_kategori_fasilitas = :kategori_fasilitas, deskripsi = :deskripsi, gambar = :gambar WHERE id_fasilitas = :id_fasilitas';

    $this->db->query($query);

    $this->db->bind('id_fasilitas', $data[0]['id']);
    $this->db->bind('nama', $data[0]['nama']);
    $this->db->bind('kategori_fasilitas', $data[0]['kategori']);
    $this->db->bind('deskripsi', $data[0]['konten']);
    $this->db->bind('gambar', $gambar);


    $this->db->execute();

    return $this->db->rowCount();
  }
  public function hapusKategoriFasilitas($data)
  {
    $query = 'DELETE FROM ' . $this->linkTable . ' WHERE id_kategori_fasilitas = :id_fasilitas';

    $this->db->query($query);

    $this->db->bind('id_fasilitas', $data);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function hapusFasilitas($data)
  {
    $query = 'DELETE FROM ' . $this->table . ' WHERE id_fasilitas = :id_fasilitas';

    $this->db->query($query);

    $this->db->bind('id_fasilitas', $data);

    $this->db->execute();

    return $this->db->rowCount();
  }
  function upload($data)
  {
    $namaFile = $data[1]['gambar']['name'];
    $ukuranFile = $data[1]['gambar']['size'];
    $error = $data[1]['gambar']['error'];
    $tmpName = $data[1]['gambar']['tmp_name'];

    //cek error gambar

    if ($error === 4) {
      Flasher::setFlash('Gagal', 'ditambahkan Karena Gambar Belum di upload', 'danger', 'Berita ');
      return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      Flasher::setFlash('Gagal', 'ditambahkan Karena Ekstensi Gambar Tidak Valid, Ekstensi Gambar Harus Berupa .JPG, .JPEG atau .PNG', 'danger', 'Berita ');
      return false;
    }
    if ($ukuranFile >= 2097152) {
      Flasher::setFlash('Gagal', 'ditambahkan Karena Ukuran Gambar Terlalu Besar', 'danger', 'Berita ');
      return false;
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    $destination_path = getcwd() . DIRECTORY_SEPARATOR;
    $target_path = $destination_path . 'image\fasilitas\a' . basename($namaFileBaru);

    move_uploaded_file($tmpName, $target_path);

    return $namaFileBaru;
  }
  function uploadUbah($data)
  {
    $namaFile = $data[1]['gambar']['name'];
    $ukuranFile = $data[1]['gambar']['size'];
    $error = $data[1]['gambar']['error'];
    $tmpName = $data[1]['gambar']['tmp_name'];

    //cek error gambar

    if ($error === 4) {
      // Flasher::setFlash('Gagal', 'ditambahkan Karena Gambar Belum di upload', 'danger', 'Berita ');
      return 4;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      Flasher::setFlash('Gagal', 'ditambahkan Karena Ekstensi Gambar Tidak Valid, Ekstensi Gambar Harus Berupa .JPG, .JPEG atau .PNG', 'danger', 'Berita ');
      return false;
    }
    if ($ukuranFile >= 2097152) {
      Flasher::setFlash('Gagal', 'ditambahkan Karena Ukuran Gambar Terlalu Besar', 'danger', 'Berita ');
      return false;
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    $destination_path = getcwd() . DIRECTORY_SEPARATOR;
    $target_path = $destination_path . 'image\fasilitas\a' . basename($namaFileBaru);

    move_uploaded_file($tmpName, $target_path);

    return $namaFileBaru;
  }
}
