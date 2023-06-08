<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Entity\book;
use App\Tools\StringTools;

class BookRepository
{
    public function findOneById(int $id)
    {
        // Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM book WHERE id = :id');
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $book = $query->fetch($pdo::FETCH_ASSOC);
        
        
        /*
        $book = ['id' => 1,  'title' => 'Titre test', 'description' => 'Description test'];
        $bookEntity = new Book();
        $bookEntity->setId($book['id']);
        $bookEntity->setTitle($book['title']);
        $bookEntity->setDescription($book['description']);
        */
        
        $bookEntity = new book();
        
        foreach ($book as $key => $value){
            $bookEntity->{'set'.StringTools::toPascalCase($key)}($value);
        }

        return $bookEntity;
    }
}