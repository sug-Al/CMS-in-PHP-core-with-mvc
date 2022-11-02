<?php

namespace app\models;

use app\Base\Database;

class Users
{
    public ?string $fullname = null;
    public ?string $address = null;
    public ?string $contact = null;
    public ?string $username= null;
    public ?string $password = null;
    public ?string $repassword = null;
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function load($data)
    {   
        $this->fullname = $data['fullname'];
        $this->address = $data['address'];
        $this->contact = $data['contact'];
        $this->username = $data['username'];
        $this->password = $data['password'];
    }

    public function save()
    {
        if(isset($this->fullname, $this->address, $this->contact)){
            $this->db->userSignin($this); 
            return true;
        }
        else{
            $this->db->userLogin($this);
            return true;
        }
    }

}