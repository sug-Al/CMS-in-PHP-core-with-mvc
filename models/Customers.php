<?php

namespace app\models;

use app\Base\Database;

class Customers
{
    public ?int $customerId = null;
    public ?string $customerName = null;
    public ?string $customer_address = null;
    public ?int $uid = null;
    private Database $db;    

    public function __construct()
    {
        $this->db = new Database();
    }

    public function load($data)
    {
        $this->customerId = (int)$data['id'];
        $this->customerName = $data['name'];
        $this->address = $data['address'];
        $this->uid = $data['uid'];
    }

    public function save()
    {
        $this->db->createCustomers($this);
        return true;
    }

    public function delete()
    {
        $this->db->deleteCustomer($this->customerId);
        return true;
    }
}