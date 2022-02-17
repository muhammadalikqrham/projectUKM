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
  public function getAllBerita()
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN ' . $this->linkTable . ' 
                        USING (id_kategori_berita) GROUP BY tanggal_upload DESC');
    // $this->db->bind('id', $id);
    return $this->db->resultSet();
  }
  public function getKategoriBeritaById($data)
  {
    $this->db->query('SELECT * FROM '  . $this->linkTable . ' WHERE id_kategori_berita = :id');

    $this->db->bind('id', $data);
    return $this->db->single();
    // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_produk = :id_produk');

    // $this->db->bind('id_produk', $data);
  }
  public function getBerita($data)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN ' . $this->linkTable . ' 
                        USING (id_kategori_berita) WHERE ' . $this->table . '.id_berita = ' . $data);
    // $this->db->bind('id', $id);
    return $this->db->single();
  }
  public function getAllKategoriBerita()
  {
    $this->db->query('SELECT * FROM '  . $this->linkTable);
    // $this->db->bind('id', $id);
    return $this->db->resultSet();
  }

  public function postBerita($data)
  {
    $gambar = $this->upload($data);
    if (!$gambar) {
      return false;
    }
    date_default_timezone_set("Asia/Singapore");
    $tanggal = date("Y-m-d H:i:s");

    $query = 'INSERT INTO ' . $this->table .
      ' VALUES (null,:judul,:kategori,:konten,"Admin",:tanggal,:gambar,:status)';

    $this->db->query($query);
    $this->db->bind('judul', $data[0]['judul']);
    $this->db->bind('kategori', $data[0]['kategori']);
    $this->db->bind('konten', $data[0]['konten']);
    $this->db->bind('status', 'unpublished');
    $this->db->bind('gambar', $gambar);
    $this->db->bind('tanggal', $tanggal);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function hapusBerita($data)
  {
    $query = 'DELETE FROM ' . $this->table . ' WHERE id_berita = :id_berita';

    $this->db->query($query);

    $this->db->bind('id_berita', $data);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function editBerita($data)
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
      ' SET judul = :judul, id_kategori_berita = :kategori_berita, konten = :konten, gambar = :gambar WHERE id_berita = :id_berita';

    $this->db->query($query);

    $this->db->bind('id_berita', $data[0]['id_berita']);
    $this->db->bind('judul', $data[0]['judul']);
    $this->db->bind('kategori_berita', $data[0]['kategori']);
    $this->db->bind('konten', $data[0]['konten']);
    $this->db->bind('gambar', $gambar);


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
    $target_path = $destination_path . 'image\berita\a' . basename($namaFileBaru);

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
    $target_path = $destination_path . 'image\berita\a' . basename($namaFileBaru);

    move_uploaded_file($tmpName, $target_path);

    return $namaFileBaru;
  }
  public function addKategoriBerita($data)
  {
    $query = 'INSERT INTO ' . $this->linkTable .
      ' VALUES (null,:kategori,:warna1,:warna2)';

    $this->db->query($query);

    $this->db->bind("kategori", $data['kategori']);
    $this->db->bind("warna1", $data['warnaText']);
    $this->db->bind("warna2", $data['warnaBackground']);
    $this->db->execute();

    return $this->db->rowCount();
  }
  public function editKategoriBerita($data)
  {
    $query = 'UPDATE ' . $this->linkTable .
      ' SET kategori_berita=:kategori, warna_text = :warna1, warna_background = :warna2 WHERE id_kategori_berita = :id';

    $this->db->query($query);

    $this->db->bind("kategori", $data['kategori']);
    $this->db->bind("warna1", $data['warnaText']);
    $this->db->bind("warna2", $data['warnaBackground']);
    $this->db->bind("id", $data['id']);
    $this->db->execute();

    return $this->db->rowCount();
  }
  public function publishBerita($data)
  {
    if (isset($data['Published'])) {
      $query = 'UPDATE ' . $this->table .
        ' SET  status = "unpublished" WHERE id_berita = :id_berita';
    } else {
      $query = 'UPDATE ' . $this->table .
        ' SET  status = "Published" WHERE id_berita = :id_berita';
    }

    $this->db->query($query);

    $this->db->bind('id_berita', $data['id_berita']);


    $this->db->execute();

    return $this->db->rowCount();
  }
}
