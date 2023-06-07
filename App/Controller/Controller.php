<?php

namespace App\Controller;

use Exception;

Class Controller
{
    public function route(): void
    {
        try {

            if (isset($_GET['controller'])){
                switch ($_GET['controller']){
                    case 'page':
                        //charger controlleur page
                        $pageController = new PageController();
                        $pageController->route();
                        break;
                    case 'book':
                        //charger controlleur book
                        $bookController = new BookController();
                        $bookController->route();
                        break;
                    default:
                        throw new \Exception("Le controleur n'existe pas");
                        break;        
                }
            }else{
                //charger la page d'accueil
                $pageController = new PageController();
                $pageController->home();
            }
        }catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    protected function render(string $path, array $params = []): void
    {
        $filePath = _ROOTPATH_.'/templates/'.$path.'.php';

        try{
            if(!file_exists($filePath)){
                //Générer erreur
                throw new \Exception("Fichier non trouvé : ".$filePath);
            }else {
                extract($params);
                require_once $filePath;
            }
        }catch(\Exception $e){
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
}