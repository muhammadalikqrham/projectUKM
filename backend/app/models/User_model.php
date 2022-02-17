<?php

class User_model
{
  private $table = 'user';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function selectAllUser()
  {
    $query = 'SELECT * FROM ' . $this->table;

    $this->db->query($query);


    return $this->db->resultSet();
  }
  public function selectUser($id)
  {
    $query = 'SELECT * FROM ' . $this->table . ' WHERE username = :username';

    $this->db->query($query);

    $this->db->bind('username', $id);


    return $this->db->resultSet();
  }

  public function addUser($data)
  {

    $cekUser = count($this->selectUser($data['username']));
    // var_dump($cekUser);
    // exit;

    if ($cekUser > 0) {
      Flasher::setFlash('', 'Username Telah Dipakai', 'error', 'User ');
      header('Location: ' . BASEURL . 'user');

      return false;
    }
    $passowrd =  md5($data['password']);

    $query = 'INSERT INTO ' . $this->table . ' VALUES(:username,:nama,:password,:role)';

    $this->db->query($query);

    $this->db->bind('username', $data['username']);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('role', $data['role']);
    $this->db->bind('password', $passowrd);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
