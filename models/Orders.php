<?php

namespace app\models;

use app\Base\Database;

class Orders
{
    public ?int $orderId = null;
    public ?int $productId = null;
    public ?int $userId = null;
    public ?int $ordered_quantity = null;
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function load($data)
    {
        $this->orderId = (int)$data['orderId'];
        $this->productId = (int)$data['productId'];
        $this->userId= (int)$data['userId'];
        $this->ordered_quantity = (int)$data['quantity'];
    }

    public function save()
    {
        if(empty($this->ordered_quantity)){
            $productInfoForOrderForm = $this->db->productOrderFormForCustomer($this->productId);
            return $productInfoForOrderForm;
        }
        else{
            $this->db->insertOrder($this);
            return true;
        }
    }

    public function edit()
    {
        if(empty($this->ordered_quantity)){
            $productInfoForUpdateOrderForm = $this->db->orderUpdateFormForCustomer($this->orderId);
            return $productInfoForUpdateOrderForm;
        }
        else{
            $this->db->customerUpdateOrder($this);
            return true;
        }
    }

    public function delete()
    {
        $this->db->customerDeleteOrder($this->orderId);
        return true;
    }
}
