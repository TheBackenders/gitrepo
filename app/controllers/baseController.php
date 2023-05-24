<?php

class baseController
{
    protected $model;
    
    public function load_view($view,$args)
    {
        require_once  __DIR__. '\..\..\views\\'.$view.'.html';
        
    }
   
   
}

?>