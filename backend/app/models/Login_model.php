<?php
class Login_model extends Database
{
  private $table = 'user';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function cekLogin($data)
  {
    $query = 'SELECT * FROM ' . $this->table . ' WHERE username = :username and password = :password';

    $this->db->query($query);

    $this->db->bind('username', $data['username']);
    $this->db->bind('password', md5($data['password']));

    $akun = $this->db->resultSet();

    $_SESSION['username'] = $akun[0]['username'];
    $_SESSION['nama'] = $akun[0]['nama'];
    $_SESSION['role'] = $akun[0]['role'];

    return count($this->db->resultSet());
  }
  public function editNama($data)
  {
    $query = 'UPDATE ' . $this->table .
      ' SET  nama = :nama WHERE username = :username';

    $this->db->query($query);

    $this->db->bind('username', $data['id']);
    $this->db->bind('nama', $data['nama']);
    $_SESSION['nama'] = $data['nama'];


    $this->db->execute();

    return $this->db->rowCount();
  }
  public function editPassword($data)
  {
    $query = 'UPDATE ' . $this->table .
      ' SET  password = :password WHERE username = :username';

    $this->db->query($query);

    $this->db->bind('username', $data['id']);
    $this->db->bind('password', md5($data['password']));


    $this->db->execute();

    return $this->db->rowCount();
  }
  public function cekUser($data)
  {
    $query = 'SELECT * FROM ' . $this->table . ' WHERE username = :username';

    $this->db->query($query);

    $this->db->bind('username', $data['id']);

    return $this->db->resultSet();
  }
}
