<?php

class Profil_model
{
    private $table = 'tb_profil';
    // private $linkTable = 'toko';
    // private $linkTable2 = 'kategori_produk';

    // private $primaryLink = 'id_toko';
    // private $primary = "id_produk";
    // private $secondaryLink = 'id_kategori_produk';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProfil()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getProfilById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_profil = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // public function getVisi()
    // {
    //     $this->db->query('SELECT * FROM ' . $this->table . ' WHERE Kategori = "Visi"');
    //     return $this->db->single();
    // }

    // public function getMisi()
    // {
    //     $this->db->query('SELECT * FROM ' . $this->table . ' WHERE Kategori = "Misi"');
    //     return $this->db->single();
    // }

    // public function getDeskripsi()
    // {
    //     $this->db->query('SELECT * FROM ' . $this->table . ' WHERE Kategori = "Deskripsi"');
    //     return $this->db->single();
    // }

    public function edit($data)
    {
        $gambar = $this->uploadUbah($data);
        if (!$gambar) {
            return false;
        } elseif ($gambar === 4) {
            $gambar = $data[0]['gambar'];
        }
        $query = 'UPDATE ' . $this->table . ' SET Keterangan = :keterangan, Kategori = :nama ,gambar = :gambar WHERE id_profil = :id';
        $this->db->query($query);

        $this->db->bind('id', $data[0]['id']);
        $this->db->bind('nama', $data[0]['nama']);
        $this->db->bind('keterangan', $data[0]['konten']);
        $this->db->bind('gambar', $gambar);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function postProfil($data)
    {
        $gambar = $this->upload($data);
        if (!$gambar) {
            return false;
        }

        $query = 'INSERT INTO ' . $this->table .
            ' VALUES (null,:nama,:konten,:gambar)';

        $this->db->query($query);
        $this->db->bind('nama', $data[0]['nama']);
        $this->db->bind('konten', $data[0]['konten']);
        $this->db->bind('gambar', $gambar);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusProfil($data)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_profil = :id_profil';

        $this->db->query($query);

        $this->db->bind('id_profil', $data);

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
        $target_path = $destination_path . 'image\profil\a' . basename($namaFileBaru);

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
        $target_path = $destination_path . 'image\profil\a' . basename($namaFileBaru);

        move_uploaded_file($tmpName, $target_path);

        return $namaFileBaru;
    }
}
