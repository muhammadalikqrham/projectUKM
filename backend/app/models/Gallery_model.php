<?php
class Gallery_model
{
  private $table = 'gallery';
  private $db;

  public function __construct()
  {
    $this->db  = new Database;
  }

  public function getAllGallery()
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' GROUP BY id_gallery DESC');
    return $this->db->resultSet();
  }

  public function postGallery($data)
  {
    $banner = $this->upload($data);
    if (!$banner) {
      return false;
    }
    $query = 'INSERT INTO ' . $this->table . ' VALUES(null,:banner,:kategori,:deskripsi)';

    $this->db->query($query);
    $this->db->bind('banner', $banner);
    $this->db->bind('deskripsi', $data[0]['deskripsi']);
    $this->db->bind('kategori', $data[0]['kategori']);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function addKategoriGallery($data)
  {
    $query = 'INSERT INTO tb_kategori_gallery VALUES(null,:kategori)';

    $this->db->query($query);
    $this->db->bind('kategori', $data['kategori']);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function editKategoriGallery($data)
  {
    $query = 'UPDATE tb_kategori_gallery SET nama_kategori_gallery = :kategori WHERE id_kategori_gallery = :id';

    $this->db->query($query);
    $this->db->bind('kategori', $data['kategori']);
    $this->db->bind('id', $data['id_kategori']);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function hapusKategoriGallery($data)
  {
    $query = 'DELETE FROM tb_kategori_gallery WHERE id_kategori_gallery = :id';

    $this->db->query($query);
    $this->db->bind('id', $data);

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
    $target_path = $destination_path . 'image\gallery\a' . basename($namaFileBaru);

    move_uploaded_file($tmpName, $target_path);

    return $namaFileBaru;
  }
  public function hapusFoto($data)
  {
    $query = 'DELETE FROM ' . $this->table . ' WHERE id_gallery = :id';

    $this->db->query($query);

    $this->db->bind('id', $data);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function publishBanner($data)
  {
    if (isset($data['Published'])) {
      $query = 'UPDATE ' . $this->table .
        ' SET  status = "Published" WHERE id_banner = :id_banner';
    } else {
      $query = 'UPDATE ' . $this->table .
        ' SET  status = "unpublished" WHERE id_banner = :id_banner';
    }
    // echo $query;
    // exit;

    $this->db->query($query);

    $this->db->bind('id_banner', $data['id_banner']);


    $this->db->execute();

    return $this->db->rowCount();
  }
  public function get_kategory()
  {
    $this->db->query('SELECT * FROM tb_kategori_gallery');
    return $this->db->resultSet();
  }
}
