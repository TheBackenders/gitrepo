<?php

require_once __DIR__ . '\..\models\Place.php';
require_once __DIR__ . '\baseController.php';





class PlaceController extends baseController
{
    public function __construct()
    {
        $this->model = new Place();
    }

    public function all()
    {
        $result = $this->model->all('places', ['*']);
        return $result->fetchAll(PDO::FETCH_CLASS, Place::class);
        ;
    }

}
?>