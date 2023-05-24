
<?php



$request = $_SERVER['REQUEST_URI'];
define('BASE_PATH','/Task1/');

switch ($request) {
  
    case BASE_PATH:
           require_once __DIR__ . '/app/controllers/FamilyController.php'; 
           $controller = new FamilyController();
           $controller->load_view('index',[]);
           break;
    case BASE_PATH.'all-families' :
        require_once __DIR__ . '/app/controllers/FamilyController.php';
        $controller = new FamilyController();
        $controller->all();
        break;
        case BASE_PATH.'register':
            require_once __DIR__ . '/app/controllers/FamilyController.php';
            require_once __DIR__ . '/app/controllers/PlaceController.php';
            $controller = new FamilyController();
            $placecontroller=new PlaceController();
            $controller->load_view('register',$placecontroller->all());
            break;
        
        case BASE_PATH.'add-family':
                            require_once __DIR__ . '/app/controllers/FamilyController.php';
                            $controller = new FamilyController();
                            $controller->store();
                            break;
        case strpos($request,BASE_PATH.'pop-update-page')===0:
           echo 'update-page';
            require_once __DIR__ . '/app/controllers/FamilyController.php';
            $controller = new FamilyController();
            $controller->update();
         

            break;
                   
            case strpos($request,BASE_PATH.'update-data')===0:
          // die('updatedata');
            require_once __DIR__ . '/app/controllers/FamilyController.php';
            $controller = new FamilyController();
            $controller->updateData();
         

            break;
            case strpos($request,BASE_PATH.'delete')===0:
           
                require_once __DIR__ . '/app/controllers/FamilyController.php';
                $controller = new FamilyController();
                $controller->delete();
             
    
                break;

        // case BASE_PATH.'show' :
        //     require_once __DIR__ . '/app/controllers/UserController.php';
        //     $controller = new UserController();
        //     $controller->load_view('show-one',[]);
        //     break;
        //     case BASE_PATH.'get-user' :
        //         require_once __DIR__ . '/app/controllers/UserController.php';
        //         $controller = new UserController();
        //         $controller->getOne();
        //         break;
        //     case BASE_PATH.'register':
        //             require_once __DIR__ . '/app/controllers/UserController.php';
        //             $controller = new UserController();
        //             $controller->load_view('register',[]);
        //             break;
        //        
        //     case BASE_PATH.'update':
        //                 require_once __DIR__ . '/app/controllers/UserController.php';
        //                 $controller = new UserController();
        //                 $controller->load_view('update',[]);
        //                 break;
        //     case BASE_PATH.'update-data':
        //                     require_once __DIR__ . '/app/controllers/UserController.php';
        //                     $controller = new UserController();
        //                     $controller->update();
        //                     break;
       
   
}

?>