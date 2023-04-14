<?php
require_once "./class/UserDaoMysql.php";
require "./class/Users.php";

class UserDaoMysql implements UserDao
{
    private $pdo;

    public function __construct(PDO $engine)
    {
        $this->pdo = $engine;
    }


    public function add(Users $u)
    {
    }
    public function findAll()
    {
        $array = [];

        return $array;
    }
    public function findById($id)
    {
    }
    public function findByEmail($email)
    {
    }
    public function update(Users $u)
    {
    }
    public function delete($id)
    {
    }
}
