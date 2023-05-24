<?php


require_once  __DIR__. '\baseModel.php';


class Family extends baseModel
{

public int $id;
public int $place_id;
public string $full_name;
public string $phone_number;
public int $members_count;
public bool $is_employed;


public function __construct()
{ 
  parent::__construct();
}


}

?>
