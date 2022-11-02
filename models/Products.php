<?php

namespace app\models;

use app\Base\Database;

class Products
{
    public ?int $productId = null;
    public ?string $productName = null;
    public ?float $product_price = null;
    public ?int $product_quantity = null;
    private Database $db;    

    public function __construct()
    {
        $this->db = new Database();
    }

    public function load($data)
    {
        $this->productId = (int)$data['id'];
        $this->productName = $data['name'];
        $this->product_price = $data['price'];
        $this->product_quantity = $data['quantity'];
    }

    public function save()
    {
        $this->db->addNewProducts($this);
        return true;
    }

    public function update()
    {
        if (isset($this->productName, $this->product_price, $this->product_quantity)) {
            $this->db->updateProducts($this);
            return true;
        } else {
            $formData = $this->db->productUpdateFormForAdmin($this->productId);
            return $formData;
        }
    }

    public function delete()
    {
        $this->db->deleteProducts($this->productId);
        return true;
    }

}