<?php

namespace App\Controller;

use App\Repository\BookRepository;

Class BookController extends Controller
{
    public function route(): void
    {
        try {

            if (isset($_GET['action'])){
                switch ($_GET['action']){
                    case 'show':
                        $this->show();
                        break;
                    case 'list':
                        // Appel la méthode list()
                        break;
                    case 'edit':
                        // Appel la méthode edit()
                        break;
                    case 'add':
                        // Appel la méthode add()
                        break;
                    case 'delete':
                        // Appel la méthode delete()
                        break;
                    default:
                        throw new \Exception("Cette action n'existe pas : ".$_GET['action']);
                        break;        
                }
            }else{
                throw new \Exception("Aucune action détectée");
            }
        }catch (\Exception $e){
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]); 
        }
    }

    protected function show()
    {
        try {
            if (isset($_GET['id'])){
                $id = (int)$_GET['id'];
                // Charger le livre par un appel au repository
                $bookRepository = new BookRepository();
                $book = $bookRepository->findOneById($id);

                $this->render('book/show', [
                    'book' => $book
                ]);
            }else{
                throw new \Exception("L'id est manquant en paramètre");
            }
        }catch (\Exception $e){
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]); 
        
        }
    }
}
