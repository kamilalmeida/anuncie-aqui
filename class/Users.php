<?php

class Users
{
    private $id;
    private $nome;
    private $email;
    private $password;
    private $telefone;

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
        return $this->nome;
    }

    public function setName($name)
    {
        $this->nome = ucwords(trim($name));
    }
    public function getEmail()
    {
        return  $this->email;
    }

    public function setEmail($email)
    {
        $this->email = strtolower(trim($email));
    }
    public function getPassowrd()
    {
        return  $this->password;
    }

    public function setPassword($password)
    {
        $this->password = trim($password);
    }
    public function getTelefone()
    {
        return  $this->telefone;
    }

    public function setTelefone($tel)
    {
        $this->email = trim($tel);
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
