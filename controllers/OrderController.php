<?php

namespace app\controllers;

use app\models\Orders;
use app\Router;

require_once __DIR__ . '/../Base/Session.php';

class OrderController extends AbstractController
{

    public static function customerProductOrderForm(Router $router)
    {
        $orderData = [
            'productId' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $orderData['productId'] = $_POST['productId'];
            $order = new Orders();
            $order->load($orderData);
            $saved_data = $order->save();

            if (!empty($saved_data)) {
                self::renderOrdersForm($saved_data, $router);
            } 
            else {
                echo "No valid product or product not available ";
            }   
        } else {
            self::renderOrdersForm(null, $router);
        }

    }

    public static function insertsNewOrdersOfCustomers()
    {
        $postedOrderData = [
            'productId' => '',
            'userId' => '',
            'quantity' => '',
        ];

        $order = new Orders();

        $postedOrderData['userId'] = $_SESSION['userId'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postedOrderData['productId'] = $_POST['productId'];
            $postedOrderData['quantity'] = $_POST['quantity'];

            $order->load($postedOrderData);
            if ($order->save()) {
                self::redirectTo("http://localhost:8080/customer/orders");
            } else {
                echo "Order failure";
                exit;
            }
        } 
    }

    public static function customerUpdateOrderForm(Router $router)
    {
        $orderData = [
            'orderId' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $orderData['orderId'] = $_POST['orderId'];
            $order = new Orders();
            $order->load($orderData);
            $saved_data = $order->edit();

            if (!empty($saved_data)) {
                self::renderOrderUpdateForm($saved_data, $router);
            } 
            else {
                echo "No order available ";
            }   
        } else {
            self::renderOrderUpdateForm(null, $router);
        }

    }

    public static function updateOrder(Router $router)
    {
        $orderData = [
            'orderId' => '',
            'quantity' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $orderData['orderId'] = $_POST['orderId'];
            $orderData['quantity'] = $_POST['quantity'];
            $order = new Orders();
            $order->load($orderData);
            if($order->edit()){
                self::redirectTo("http://localhost:8080/customer/orders");
            }
            else{
                echo "Order edit unsuccessful";
            }
        }
        else{
            echo "Order update GET method called";
        }
    }

    public static function deleteOrder()
    {
        $orderData = [
            'orderId' => '',
        ];

        if($_SERVER['REQUEST_METHOD']  === 'POST'){
            $orderData['orderId'] = $_POST['orderId'];
            $order = new Orders();
            $order->load($orderData);
            if($order->delete()){
                if($_SESSION['userType'] == '0'){
                    self::redirectTo("http://localhost:8080/customer/orders");
                }
                else{
                    self::redirectTo("http://localhost:8080/admin/orders");
                }
            }
            else{
                echo "Delete unsuccessful";
            }
        }
    }

    public static function renderOrdersForm($savedData, $router)
    {
        $router->renderView('_customer_page/orders/new_order_form',
            [
                'orders' => $savedData,
            ],
            '_customer_page'
        );
    }

    public static function renderOrderUpdateForm($savedData, $router)
    {
        $router->renderView('_customer_page/orders/edit_order_form',
            [
                'orders' => $savedData,
            ],
            '_customer_page'
        );
    }

}