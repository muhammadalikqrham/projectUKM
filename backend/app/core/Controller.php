<?php

class Controller
{
  public function view($view, $data = [])
  {
    require_once '../backend/app/views/' . $view . '.php';
  }

  public function model($model, $data = [])
  {
    require_once '../backend/app/models/' . $model . '.php';
    return new $model;
  }
}
