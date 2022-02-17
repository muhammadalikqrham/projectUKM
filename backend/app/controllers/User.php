<?php

class User extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['username'])) {
      header('Location:' . BASEURL . 'login');
    }
  }
  public function index()
  {
    $data['tittle'] = "Admin - User";
    $data['pages'] = "User";
    $data['user'] = $this->model('User_model')->selectAllUser();
    $this->view('templates/header', $data);
    $this->view('user/index', $data['user']);
    $this->view('templates/footer');
  }
  public function add()
  {
    $data['tittle'] = "Admin - User";
    $data['pages'] = "User";
    // $data['user'] = $this->model('User_model')->getAllUser();
    $this->view('templates/header', $data);
    $this->view('user/add');
    $this->view('templates/footer');
  }
  public function tambah_user()
  {
    if ($this->model('User_model')->addUser($_POST) > 0) {
      Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'User ');
      header('Location: ' . BASEURL . 'user');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'ditambahkan', 'success', 'User ');
      header('Location: ' . BASEURL . 'user');
      exit;
    }
  }
}
