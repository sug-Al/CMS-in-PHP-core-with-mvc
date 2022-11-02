<?php

namespace app\controllers;

use app\models\Customers;
use app\Router;

require_once __DIR__ . '/../Base/Session.php';

class CustomerController extends AbstractController
{

    public static function addNewCustomersByAdmin(Router $router)
    {
        $errors = [];
        $customerData = [
            'id' => '',
            'name' => '',
            'address' => '',
            'uid' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $customerData['id'] = $_POST['customerId'];
            $customerData['name'] = $_POST['customerName'];
            $customerData['address'] = $_POST['address'];
            $customerData['uid'] = $_POST['uid'];

            $customer = new Customers();
            $customer->load($customerData);
            $errors = $customer->save();

            if (empty($errors)) {
                self::redirectTo('http://localhost:8080/customers');
            } else {
                self::renderAddNewCustomerForm($customerData, $errors, $router);
            }
        } else {
            self::renderAddNewCustomerForm($customerData, $errors, $router);
        }
    }

    // public static function updateExistingCustomerInfoByAdmin()
    // {
    //     echo "update page";
    // }

    public static function deleteExistingCustomerByAdmin()
    {
        $customerData = [
            'id' => ''
        ];

        if($_SERVER[REQUEST_METHOD] === 'POST'){
            $customerData['id'] = $_POST['customerId'];
            $customer = new Customers();
            $customer->load($customerData);
            if($customer->delete()){
                self::redirectTo('http://localhost:8080/admin/customers');
            }
            else{
                echo "Delete unsuccessful";
            }
        }
    }

    public function renderAddNewCustomerForm($customerData, $errors, $router)
    {
        $this->router->renderView('customers/create',
            [
                'customers' => $customerData,
                'errors' => $errors,
            ],
            'customers'
        );
    }

}