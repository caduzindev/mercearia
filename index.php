<?php
require __DIR__."/vendor/autoload.php";
require __DIR__."/config.php";

use CoffeeCode\Router\Router;

$router = new Router(BASE_URL);

$router->namespace("App\Controllers");

//rotas users
$router->get('/',"HomeController:index");
$router->post('/registerUsers','HomeController:registerUsers');
$router->get('/promotions','HomeController:promotions');
$router->get('/admin',"AdminController:homeAdmin");

//rotas de login
$router->get('/admin/login',"LoginController:login");
$router->post('/admin/login/verify',"LoginController:verifyLogin");
$router->get('/admin/logout',"LoginController:logout");

//rotas admin
$router->get('/admin/editInfo',"AdminController:editInfo");
$router->post('/admin/editInfo',"AdminController:editInfo");
$router->get('/admin/addProduct',"ProductsController:addProduct");
$router->post('/admin/addProduct',"ProductsController:addProduct");
$router->get('/admin/listProducts',"ProductsController:listProduct");
$router->get('/admin/usersList',"RegisterController:usersList");
$router->get('/admin/removeProduct/{id}',"ProductsController:remove");

//error
$router->get("/error/{erro}",function($data){
    echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Not Found</title></head><body><div style="width:80%;margin:0 auto;"><img style="width:100%;height:100vh" src="'.BASE_PATH_IMAGES.'404.svg" alt="404"></div></body></html>';
});

$router->dispatch();

if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}