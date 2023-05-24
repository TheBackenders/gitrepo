<?php

require_once  __DIR__. '\..\models\Family.php';
require __DIR__.'\baseController.php';
require __DIR__.'\PlaceController.php';


 


class FamilyController extends baseController
{
public function __construct()
{
$this->model=new Family();
}

public function all()
{
$result=$this->model->all('families',['*']);
$this->load_view('show',$result->fetchAll(PDO::FETCH_CLASS,Family::class));

 }
 public function delete()
{
$result=$this->model->deleteObjectById('families',$_GET['id']);
if(!$result)
{
  die('No Such id');
}
else
$this->load_view('index',[]);

 }
public function getOne()
{
  $args=['c_name'=>$_POST['radiobutton'],'value'=>$_POST['searchValue']];
 // print_r($args);
  $result=$this->model->getOne('users',$args);
  if($result!=null)
  $this->load_view('display-user',$result);
  else
  echo 'NOT FOUND';

} 
public function store()
{

 if(!empty($_POST))     
{  

$values=[$_POST['full_name'],$_POST['phone_number'],$_POST['members_count'],$_POST['taskOption'],$_POST['radiobutton']];
$args=['full_name','phone_number','members_count','place_id','is_employed'];
$this->model->insert('families',$args,$values);

}

}
public function update()
{
  $placeController=new PlaceController();
  $places=$placeController->all();
  $family=$this->model->getObjectById('families',$_GET['id']);
  $args=['places'=>$places,'family'=>$family];
   $this->load_view('update',$args);
}
public function updateData()
{
  $values=[$_POST['full_name'],$_POST['phone_number'],$_POST['members_count'],$_POST['taskOption'],$_POST['radiobutton']];
$args=['full_name','phone_number','members_count','place_id','is_employed'];
 $family=$this->model->getObjectById('families',$_GET['id']);
echo'<pre>'; 
var_dump($values);
 var_dump($family);
 
}
}

?>