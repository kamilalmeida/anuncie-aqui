<?php
require_once "./class/CategoryDaoMysql.php";
require "./class/Category.php";

class CategoryDaoMysql implements CategoryDao
{
    private $pdo;

    public function __construct(PDO $engine)
    {
        $this->pdo = $engine;
    }

    public function getListCategory()
    {

        $array = [];
        $sql = $this->pdo->query("SELECT * FROM category");


        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }


}
