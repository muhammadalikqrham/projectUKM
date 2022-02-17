<?php
class Login extends Controller
{

  // public function __construct()
  // {
  // }
  public function index()
  {
    session_destroy();
    $this->view('login/index');
  }
  public function cekLogin()
  {
    if ($this->model('Login_model')->cekLogin($_POST) > 0) {
      header('Location:' . BASEURL . 'beranda');
    } else {
      header('Location:' . BASEURL . 'login');
    }
  }
  public function editNama()
  {
    // var_dump($_POST);
    // exit;
    if ($this->model('Login_model')->editNama($_POST) > 0) {
      Flasher::setFlash('Berhasil', 'diubah', 'success', 'Nama Pengguna ');
      header('Location: ' . BASEURL . 'dashboard');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'diubah', 'danger', 'Nama Pengguna ');
      header('Location:' . BASEURL . 'dashboard');
    }
  }
  public function editPassword()
  {
    // var_dump($_POST);
    // exit;
    if ($this->model('Login_model')->editPassword($_POST) > 0) {
      Flasher::setFlash('Berhasil', 'diubah', 'success', 'Password ');
      header('Location: ' . BASEURL . 'dashboard');
      exit;
    } else {
      Flasher::setFlash('Gagal', 'diubah', 'danger', 'Password ');
      header('Location:' . BASEURL . 'dashboard');
    }
  }
  public function logout()
  {
    session_destroy();
    header('Location:' . BASEURL . 'login');
  }
  public function cekUser()
  {
    $data = $this->model('Login_model')->cekUser($_POST);
    echo json_encode($data);
    exit;
  }
}
