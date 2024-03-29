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

   
    public function addUser(Users $u)
    {
        $sql = $this->pdo->prepare("INSERT INTO users(name, email, telephone, password) VALUES(:name, :email, :telephone, :password)");
        $sql->bindValue(':name', $u->getName());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':telephone', $u->getTelephone());
        $sql->bindValue(':password', md5($u->getPassword()));
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;
    }
    public function login($email, $password)
    {
        $sql = $this->pdo->prepare("SELECT id FROM users WHERE email = :email AND password = :password");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', md5($password));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
            $_SESSION['cLogin'] = $data['id'];
            return true;
        } else {
            return false;
        }
    }
    public function findAll()
    {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM users");

        $data = $sql->fetchAll();

        foreach ($data as $item) {
            $users = new Users();
            $users->setId($item['id']);
            $users->setName($item['name']);
            $users->setEmail($item['email']);
            $users->setTelephone($item['telephone']);
            $users->setPassword($item['password']);

            $array[] = $users;
        }

        return $array;
    }
    public function findById($id)
    {
    }
    public function findByEmail($email)
    {
        $sql = $this->pdo->prepare("SELECT * FROM users  WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $user = new Users();
            $user->setId($data['id']);
            $user->setName($data['name']);
            $user->setEmail($data['email']);
            $user->setTelephone($data['telephone']);
            $user->setPassword($data['password']);

            return $user;
        } else {
            return false;
        }
    }
    public function update(Users $u)
    {
    }
    public function delete($id)
    {
    }
}
