<?php
class Banner_model
{
  private $table = 'banner';
  private $db;

  public function __construct()
  {
    $this->db  = new Database;
  }

  public function getAllBanner()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }

  public function postBanner($data)
  {
    // echo count($data[1]['banner']['name']);
    $rowCount = 0;
    for ($i = 0; $i < count($data[1]['banner']['name']); $i++) {
      $banner = $this->upload($data, $i);
      if (!$banner) {
        return false;
      }

      $query = 'INSERT INTO ' . $this->table . ' VALUES(null,:banner,:status)';

      $this->db->query($query);
      $this->db->bind('banner', $banner);
      $this->db->bind('status', 'unpublished');

      $this->db->execute();

      // $this->db->rowCount();

      $rowCount = $rowCount + $this->db->rowCount();
    }
    // echo $this->upload($data, 0);
    // exit;
    // echo $rowCount;
    // exit;
    return $rowCount;
  }

  function upload($data, $number)
  {
    $namaFile = $data[1]['banner']['name'][$number];
    $ukuranFile = $data[1]['banner']['size'][$number];
    $error = $data[1]['banner']['error'][$number];
    $tmpName = $data[1]['banner']['tmp_name'][$number];

    //cek error gambar

    if ($error === 4) {
      Flasher::setFlash('Gagal', 'ditambahkan Karena Gambar Belum di upload', 'danger', 'Banner ');
      return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      Flasher::setFlash('Gagal', 'ditambahkan Karena Ekstensi Gambar Tidak Valid, Ekstensi Gambar Harus Berupa .JPG, .JPEG atau .PNG', 'danger', 'Banner ');
      return false;
    }
    if ($ukuranFile >= 2097152) {
      Flasher::setFlash('Gagal', 'ditambahkan Karena Ukuran Gambar Terlalu Besar', 'danger', 'Banner ');
      return false;
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    $destination_path = getcwd() . DIRECTORY_SEPARATOR;
    $target_path = $destination_path . 'image\banner\a' . basename($namaFileBaru);

    move_uploaded_file($tmpName, $target_path);

    return $namaFileBaru;
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
  public function singleBanner($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_banner = :id');

    $this->db->bind('id', $id);
    return $this->db->single();
  }
  public function hapusBanner($id)
  {
    $rowCount = 0;
    for ($i = 0; $i < count($id['banner']); $i++) {
      $query = $this->singleBanner($id['banner'][$i]);

      // unlink(BASEURL . 'image/banner/a' . $query['gambar']);
      unlink(getcwd() . '\image\banner\a' . $query['gambar']);
    }

    for ($i = 0; $i < count($id['banner']); $i++) {
      $query = 'DELETE FROM banner WHERE id_banner = :id';

      $this->db->query($query);
      $this->db->bind('id', $id['banner'][$i]);

      $this->db->execute();

      $rowCount = $rowCount + $this->db->rowCount();
    }
    return $rowCount;
  }
}
