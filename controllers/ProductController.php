<?php

namespace app\controllers;

use app\models\Products;
use app\Router;

class ProductController extends AbstractController
{

    public static function adminAddNewProducts(Router $router)
    {
        $productData = [
            'id' => '',
            'name' => '',
            'quantity' => '',
            'price' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData['id'] = empty($_POST['productId']) ? null : intval($_POST['productId']);
            $productData['name'] = $_POST['productName'];
            $productData['price'] = $_POST['price'];
            $productData['quantity'] = $_POST['quantity'];

            $product = new Products();
            $product->load($productData);

            if ($product->save()) {
                self::redirectTo('http://localhost:8080/admin/products');
            } else {
                self::renderAddNewProductsForm($productData, $router);
            }
        } else {
            self::renderAddNewProductsForm(null, $router);
        }

    }

    public static function productUpdateForm(Router $router)
    {
        $productData = [
            'id' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $productData['id'] = $_POST['productId'];
            $product = new Products();
            $product->load($productData);
            $saved_data = $product->update();
            if(!empty($saved_data)){
                self::renderUpdateProductForm($saved_data, $router);
            }
            else{
                echo "No such product available";
            }
        }
        else{
            self::renderUpdateProductForm(null, $router);
        }
    }

    public static function adminUpdateProducts(Router $router)
    {
        $productData = [
            'id' => '',
            'name' => '',
            'price' => '',
            'quantity' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $productData['id'] = $_POST['productId'];
            $productData['name'] = $_POST['productName'];
            $productData['price'] = $_POST['product_price'];
            $productData['quantity'] = $_POST['product_quantity'];
            $product = new Products();
            $product->load($productData);
            if($product->update()){
                self::redirectTo('http://localhost:8080/admin/products');
            }
            else{
                echo "Update failure";
            }
        }   
        else{
            self::renderUpdateProductForm(null, $router);
        }
    }

    public static function adminDeleteProducts()
    {
        $productData = [
            'id' => '',
        ];

        if($_SERVER['REQUEST_METHOD']  === 'POST'){
            $productData['id'] = $_POST['productId'];
            $product = new Products();
            $product->load($productData);
            if($product->delete()){
                self::redirectTo("http://localhost:8080/admin/products");
            }
            else{
                echo "Delete unsuccessful";
            }
        }
    }

    public static function renderAddNewProductsForm($productData, $router)
    {
        $router->renderView('/_admin_page/products/add_new_products',
            [
                'products' => $productData,
            ],
            '_admin_page'
        );
    }

    public static function renderUpdateProductForm($productData, $router)
    {
        $router->renderView('/_admin_page/products/edit_products',
            [
                'products' => $productData
            ],
            '_admin_page'
        );
    }
}