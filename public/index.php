<?php

require_once __DIR__ . '/../vendor/autoload.php'; 

use app\controllers\CustomerController;
use app\controllers\OrderController;
use app\controllers\ProductController;
use app\controllers\UserController;
use app\controllers\MainController;
use app\controllers\AbstractController;
use app\Router;

$router = new Router(); // Creating a router object of Router class

// Landing, Login, Signin and logout routing

$router->get('/', [MainController::class, 'landingPage']);

$router->get('/login', [UserController::class, 'userLogin']);
$router->post('/login', [UserController::class, 'userLogin']);

$router->get('/signin', [UserController::class, 'userSignin']);
$router->post('/signin', [UserController::class, 'userSignin']);

$router->post('/logout', [UserController::class, 'userLogout']);

// Admin page routing

$router->get('/admin/products', [MainController::class, 'authAdminProductPage']);
$router->post('/admin/products', [MainController::class, 'authAdminProductPage']);

$router->get('/admin/add/products', [ProductController::class, 'adminAddNewProducts']);
$router->post('/admin/add/products', [ProductController::class, 'adminAddNewProducts']);

$router->get('/admin/edit/products', [ProductController::class, 'productUpdateForm']);
$router->post('/admin/edit/products', [ProductController::class, 'productUpdateForm']);

$router->get('/admin/updated/products', [ProductController::class, 'adminUpdateProducts']);
$router->post('/admin/updated/products', [ProductController::class, 'adminUpdateProducts']);

$router->post('/admin/delete/products', [ProductController::class, 'adminDeleteProducts']);

$router->get('/admin/customers', [MainController::class, 'authAdminCustomerPage']);
$router->post('/admin/customers', [MainController::class, 'authAdminCustomerPage']);

$router->post('/admin/delete/customers', [CustomerController::class, 'deleteExistingCustomerByAdmin']);

$router->get('/admin/orders', [MainController::class, 'authAdminOrderPage']);
$router->post('/admin/orders', [MainController::class, 'authAdminOrderPage']);

$router->post('/admin/delete/orders', [OrderController::class, 'deleteOrder']);

// Customer page routing

$router->get('/customer/products', [MainController::class, 'authCustomerProductPage']);
$router->post('/customer/products', [MainController::class, 'authCustomerProductPage']);

$router->get('/customer/orders', [MainController::class, 'authCustomerOrderPage']);
$router->post('/customer/orders', [MainController::class, 'authCustomerOrderPage']);

$router->get('/customer/product/orders', [OrderController::class, 'customerProductOrderForm']);
$router->post('/customer/product/orders', [OrderController::class, 'customerProductOrderForm']);

$router->get('/customer/new_orders', [OrderController::class, 'insertsNewOrdersOfCustomers']);
$router->post('/customer/new_orders', [OrderController::class, 'insertsNewOrdersOfCustomers']);

$router->get('/customer/edit/orders', [OrderController::class, 'customerUpdateOrderForm']);
$router->post('/customer/edit/orders', [OrderController::class, 'customerUpdateOrderForm']);

$router->get('/customer/updated/orders', [OrderController::class, 'updateOrder']);
$router->post('/customer/updated/orders', [OrderController::class, 'updateOrder']);

$router->post('/customer/delete/orders', [OrderController::class, 'deleteOrder']);

// Call to resolve function of Router class with no parameters

$router->resolve();