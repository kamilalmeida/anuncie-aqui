<?php

class Users
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $telephone;
    

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = trim($id);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = ucwords(trim($name));
    }
    public function getEmail()
    {
        return  $this->email;
    }

    public function setEmail($email)
    {
        $this->email = strtolower(trim($email));
    }
    public function getPassword()
    {
        return  $this->password;
    }

    public function setPassword($password)
    {
        $this->password = trim($password);
    }
    public function getTelephone()
    {
        return  $this->telephone;
        
    }

    public function setTelephone($tel)
    {
        $this->telephone = trim($tel);
    }
}

interface UserDao
{
    public function add(Users $u);
    public function findAll();
    public function findById($d);
    public function findByEmail($email);
    public function update(Users $u);
    public function delete($id);
}
