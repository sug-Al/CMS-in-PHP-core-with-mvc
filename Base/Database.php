<?php

namespace app\Base;

error_reporting(E_ALL);

use app\models\Customers;
use app\models\Orders;
use app\models\Products;
use app\models\Users;

require_once 'Session.php';

class Database
{
    private $conn;
    public function __construct()
    {
        $servername = "localhost";
        $username = "user";
        $password = "pass123";
        $dbname = "cms";

        $this->conn = new \mysqli($servername, $username, $password, $dbname);
        if($this->conn->connect_error){
            die("Connection failed : ". $this->conn->connect_error);
        }
    }
    
    public function userLogin(Users $user)
    {
        $sql = "SELECT * FROM users WHERE username = ? and password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $user->username, MD5($user->password));
        $stmt->execute();
        $row = $stmt->get_result()->fetch_array(MYSQLI_ASSOC); 
        if (isset($row)) {
            $_SESSION['username'] = $user->username;
            $query = "SELECT userId, user_type FROM users where username = '$user->username'";
            $result = $this->conn->query($query);
            $userData = $result->fetch_array(MYSQLI_ASSOC);
            $_SESSION['userId'] = $userData['userId'];
            $_SESSION['userType'] = $userData['user_type'];
            $_SESSION['userLoggedIn'] = true;
        
        } else {
            $_SESSION['userNotFoundMsg'] = "No matched user found";
        }
    }

    public function userSignin(Users $user)
    {
        $sql = "INSERT INTO customers (customerName, customer_address, customer_contact) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $user->fullname, $user->address, $user->contact);
        $stmt->execute();

        $sql1 = "SELECT customerId FROM customers WHERE customer_contact = $user->contact";
        $stmt1 = $this->conn->query($sql1);
        $resultCustomerId = $stmt1->fetch_array(MYSQLI_ASSOC);

        $sql2 = "INSERT INTO users (username, password, customerId) VALUES (?, ?, ?)";
        $stmt2 = $this->conn->prepare($sql2);
        $stmt2->bind_param("ssi", $user->username, MD5($user->password), $resultCustomerId['customerId']);
        $stmt2->execute();
    }
   
    public function getProductInfo()
    {   
        $sql = 'SELECT * FROM products';
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addNewProducts(Products $products)
    {
        $sql = 'INSERT INTO products (productId, productName, product_price, product_quantity) VALUES (?, ?, ?, ?)';
        $stmt = $this->conn->prepare($sql); 
        $stmt->bind_param("isdi", $products->productId, $products->productName, $products->product_price, $products->product_quantity);
        $stmt->execute();
    }

    public function productUpdateFormForAdmin(int $productId)
    {
        $sql = 'SELECT * FROM products WHERE productId = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function updateProducts(Products $products)
    {
        $sql = 'UPDATE products SET productName = ?, product_price = ?, product_quantity = ? WHERE productId = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("siii", $products->productName, $products->product_price, $products->product_quantity, $products->productId);
        $stmt->execute();
    }

    public function deleteProducts(int $productId){
        $sql = 'DELETE FROM products WHERE productId = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $productId);
        $stmt->execute();
    }

    public function getCustomerInfo()
    {
        $sql = 'SELECT c.customerId, c.customerName, c.customer_address, c.customer_contact, u.username FROM customers AS c
                JOIN users AS u ON c.customerId = u.customerId';
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createCustomers(Customers $customers)
    {
        $sql = 'INSERT INTO customers (customerId, customerName, customer_address, userId) VALUES (?, ?, ?, ?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issi", $customers->customerId, $customers->customerName, $customers->customer_address, $customers->userId);
        $stmt->execute();
    }

    public function deleteCustomer(int $customerId)
    {
        $sql = "DELETE FROM customers WHERE customerId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $customerId);
        $stmt->execute();
    }
    
    public function getOrderInfoForAdmin()
    { 
        $sql = 'SELECT o.orderId, p.productName, p.product_quantity, o.ordered_quantity, p.product_price, c.customerName, 
            c.customer_address, c.customer_contact FROM orders AS o
            JOIN products AS p ON o.productId = p.productId
            JOIN users AS u ON o.userId = u.userId
            JOIN customers AS c ON u.customerId = c.customerId';
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderInfoForSpecificCustomer(int $userId)
    {
        $sql = "SELECT o.orderId, p.productName, p.product_quantity, p.product_price, o.ordered_quantity
                    FROM orders AS o
                    JOIN products AS p ON p.productId = o.productId 
                    JOIN users AS u ON u.userId = o.userId
                    JOIN customers AS c ON c.customerId = u.customerId
                    WHERE u.userId = $userId";
    
        $result = $this->conn->query($sql);
        $row =  $result->fetch_all(MYSQLI_ASSOC);
        return $row;
    }

    public function productOrderFormForCustomer(int $productId)
    {
        $sql = "SELECT * FROM products WHERE productId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function insertOrder(Orders $order)
    {
        $sql = 'INSERT INTO orders (ordered_quantity, userId, productId) VALUES (?, ?, ?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iii', $order->ordered_quantity, $order->userId, $order->productId);
        $result = $stmt->execute();
    }

    public function orderUpdateFormForCustomer(int $oid)
    {
        $sql = "SELECT o.orderId, o.ordered_quantity, p.productName, p.product_quantity, p.product_price FROM orders as o
                JOIN products as p ON o.productId = p.productId
                WHERE o.orderId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $oid);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function customerUpdateOrder($order)
    {
        $sql = 'UPDATE orders SET ordered_quantity = ? WHERE orderId = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ii', $order->ordered_quantity, $order->orderId);
        $stmt->execute();
    }

    public function customerDeleteOrder(int $oid)
    {
        $sql = 'DELETE FROM orders WHERE orderId = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $oid);
        $stmt->execute();
    }

}