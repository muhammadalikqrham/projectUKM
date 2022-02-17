<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['username'])) {
            header('Location:' . BASEURL . 'login');
            exit;
        }
    }
    public function index()
    {
        $data['tittle'] = "Admin - Dashboard";
        $data['pages'] = "Dashboard";
        $this->view('templates/header', $data);
        $this->view('dashboard/index');
        $this->view('templates/footer');
    }
}
