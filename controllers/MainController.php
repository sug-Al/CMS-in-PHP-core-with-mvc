<?php

namespace app\controllers;

use app\Router;

require_once __DIR__ . '/../Base/Session.php';

class MainController extends AbstractController
{
    public static function landingPage(Router $router)
    {
        if($_SESSION['userLoggedIn'] == true){
            if($_SESSION['userType'] == 1){
                self::authAdminProductPage($router);
            }
            else{
                self::authCustomerProductPage($router);
            }
        }
        else{
            $products = $router->db->getProductInfo();
            $router->renderView('_landing_page/index', [
                    'products' => $products,
                ],
                null
            );
        }        
    }

    public static function authAdminProductPage(Router $router)
    {
        if(isset($_SESSION['userId']) And $_SESSION['userType'] == 1){

            $products = $router->db->getProductInfo();
            $router->renderView('_admin_page/products/index', [
                'products' => $products,
            ],
            '_admin_page');

        }
        else{
            self::redirectTo("Location: http://localhost:8080/login");
        }  
    }

    public static function authAdminCustomerPage(Router $router)
    {
        if(isset($_SESSION['userId']) And $_SESSION['userType'] == 1){
            $customers = $router->db->getCustomerInfo();
            $router->renderView('_admin_page/customers/index', [
                'customers' => $customers,
            ],
            '_admin_page');

        }
        else{
            self::redirectTo("Location: http://localhost:8080/login");
        }
    }

    public static function authAdminOrderPage(Router $router)
    {
        if(isset($_SESSION['userId']) And $_SESSION['userType'] == 1){
            $orders = $router->db->getOrderInfoForAdmin();
            $router->renderView('_admin_page/orders/index', [
                'orders' => $orders,
            ],
            '_admin_page');

        }
        else{
            self::redirectTo("Location: http://localhost:8080/login");
        }
    }

    public static function authCustomerProductPage(Router $router)
    {   

        if(isset($_SESSION['userId']) And $_SESSION['userType'] == 0){
            $products = $router->db->getProductInfo();
            $router->renderView('_customer_page/products/index', [
                'products' => $products,
            ],
            '_customer_page');
        }
        else{
            self::redirectTo("Location: http://localhost:8080/login");
        }
    }

    // public static function authCustomerPersonalDetailPage(Router $router)
    // {
    //    echo "Customer Personal Page";
    // }

    public static function authCustomerOrderPage(Router $router)
    {

        if(isset($_SESSION['userId']) And $_SESSION['userType'] == 0){
            $orders = $router->db->getOrderInfoForSpecificCustomer($_SESSION['userId']);
            $router->renderView('_customer_page/orders/index', [
                'orders' => $orders,
            ],
            '_customer_page');
        }
        else{
            self::redirectTo("Location: http://localhost:8080/login");
        }
    }
    
}