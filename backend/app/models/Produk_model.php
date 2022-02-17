<?php

class Produk_model
{
  private $table = 'produk';
  private $linkTable = 'gambar_produk';
  private $linkTable2 = 'kategori_produk';

  private $primaryLink = 'id_toko';
  private $primary = "id_produk";
  private $secondaryLink = 'id_kategori_produk';

  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllProduk()
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' 
                        INNER JOIN ' . $this->linkTable2 . ' 
                        USING (' . $this->secondaryLink . ')');
    return $this->db->resultSet();
  }
  public function getAllKategori()
  {
    $this->db->query('SELECT * FROM ' . $this->linkTable2);
    return $this->db->resultSet();
  }
  public function getProduk($data)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_produk = :id_produk');

    $this->db->bind('id_produk', $data);

    return $this->db->single();
  }
  public function add_kategori_produk($data)
  {
    $query = 'INSERT INTO ' . $this->linkTable2 . ' VALUES(null,:kategori)';

    $this->db->query($query);

    $this->db->bind("kategori", $data['kategori_produk']);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function add_produk($data)
  {
    $harga = explode('.', $data[0]['harga_produk']);
    $harga = implode('', $harga);
    $gambar = $this->upload($data);
    if (!$gambar) {
      return false;
    }
    $query = 'INSERT INTO ' . $this->table . ' VALUES(null,:nama,:harga,:id_kategori,:penjual,:no_hape,:dimensi,:warna,:deskripsi,:gambar)';
    $this->db->query($query);

    $this->db->bind("nama", $data[0]['nama_produk']);
    $this->db->bind("harga", $harga);
    $this->db->bind("id_kategori", $data[0]['kategori_produk']);
    $this->db->bind("deskripsi", $data[0]['deskripsi_produk']);
    $this->db->bind("dimensi", $data[0]['panjang'] . ' x ' . $data[0]['lebar'] . ' x ' . $data[0]['tinggi']);
    $this->db->bind("warna", $data[0]['warna_produk']);
    $this->db->bind("deskripsi", $data[0]['deskripsi_produk']);
    $this->db->bind("penjual", $data[0]['penjual']);
    $this->db->bind("no_hape", $data[0]['no_hp']);
    $this->db->bind("gambar", $gambar);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function hapus_produk($id)
  {
    $query = 'DELETE FROM ' . $this->table . ' WHERE id_produk = :id_produk';

    $this->db->query($query);
    $this->db->bind('id_produk', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function edit_produk($data)
  {
    // var_dump($data);
    // exit;

    $gambar = $this->uploadUbah($data);
    if (!$gambar) {
      return false;
    } elseif ($gambar === 4) {
      $gambar = $data[0]['gambar'];
    }
    $dimensi = $data[0]['panjang'] . ' x ' . $data[0]['lebar'] . ' x ' . $data[0]['tinggi'];

    $query = 'UPDATE ' . $this->table .
      ' SET nama_produk = :nama_produk, harga_produk = :harga_produk, id_kategori_produk = :id_kategori_produk, dimensi = :dimensi, warna = :warna, deskripsi = :deskripsi, gambar = :gambar WHERE id_produk = :id_produk';

    $this->db->query($query);

    $this->db->bind('nama_produk', $data[0]['nama_produk']);
    $this->db->bind('id_produk', $data[0]['id_produk']);
    $this->db->bind('harga_produk', $data[0]['harga_produk']);
    $this->db->bind('id_kategori_produk', $data[0]['kategori_produk']);
    $this->db->bind('dimensi', $dimensi);
    $this->db->bind('warna', $data[0]['warna_produk']);
    $this->db->bind('deskripsi', $data[0]['deskripsi_produk']);
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
      echo "<script>
            
                alert('Anda belum mengupload gambar produk!')
            
            </script>";
      return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "<script>
            
            alert('File yang anda upload bukan gambar!')
        
        </script>";
      return false;
    }
    if ($ukuranFile >= 2097152) {
      echo "<script>
            
            alert('Ukuran File Terlalu Besar')
        
        </script>";
      return false;
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    $destination_path = getcwd() . DIRECTORY_SEPARATOR;
    $target_path = $destination_path . 'image\produk\a' . basename($namaFileBaru);

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
