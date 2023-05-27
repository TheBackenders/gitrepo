<?php


require_once __DIR__ . '\baseModel.php';


class Place extends baseModel
{

  public int $id;
  public string $place_name;


  public function __construct()
  {
    parent::__construct();
  }



}

?>