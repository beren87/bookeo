<?php

namespace App\Repository;

use App\Entity\book;

class BookRepository
{
    public function findOneById(int $id)
    {
        // Appel BDD
        $book = ['id' => 1,  'title' => 'Titre test', 'description' => 'Description test'];

        $bookEntity = new Book();
        $bookEntity->setId($book['id']);
        $bookEntity->setTitle($book['title']);
        $bookEntity->setDescription($book['description']);

        return $bookEntity;
    }
}