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

$router->dispatch();