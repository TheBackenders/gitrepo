<?php



$request = $_SERVER['REQUEST_URI'];
define('BASE_PATH', '/Task1/');

switch ($request) {

    case BASE_PATH:
        require_once __DIR__ . '/app/controllers/FamilyController.php';
        $controller = new FamilyController();
        $controller->load_view('index', []);
        break;
    case BASE_PATH . 'all-families':
        require_once __DIR__ . '/app/controllers/FamilyController.php';
        $controller = new FamilyController();
        $controller->all();
        break;
    case BASE_PATH . 'register':
        require_once __DIR__ . '/app/controllers/PlaceController.php';
        $placecontroller = new PlaceController();
        $placecontroller->load_view('register', $placecontroller->all());
        break;
    case BASE_PATH . 'pop-filter-page':
        require_once __DIR__ . '/app/controllers/PlaceController.php';
        $placecontroller = new PlaceController();
        $placecontroller->load_view('filter-page', $placecontroller->all());
        break;

    case BASE_PATH . 'apply-filter':
        require_once __DIR__ . '/app/controllers/familyController.php';
        $controller = new familyController();
        $controller->getOne();
        break;

    case BASE_PATH . 'add-family':
        require_once __DIR__ . '/app/controllers/FamilyController.php';
        $controller = new FamilyController();
        $controller->store();
        break;
    case strpos($request, BASE_PATH . 'pop-update-page') === 0:

        require_once __DIR__ . '/app/controllers/FamilyController.php';
        $controller = new FamilyController();
        $controller->update();


        break;

    case strpos($request, BASE_PATH . 'update-data') === 0:
        // die('updatedata');
        require_once __DIR__ . '/app/controllers/FamilyController.php';
        $controller = new FamilyController();
        $controller->updateData();


        break;
    case strpos($request, BASE_PATH . 'delete') === 0:

        require_once __DIR__ . '/app/controllers/FamilyController.php';
        $controller = new FamilyController();
        $controller->delete();


        break;



}

?>