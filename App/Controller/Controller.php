<?php

namespace App\Controller;

use Exception;

Class Controller
{
    public function route(): void
    {
        if (isset($_GET['controller'])){
            switch ($_GET['controller']){
                case 'page':
                    //charger controlleur page
                    $pageController = new PageController();
                    $pageController->route();
                    break;
                case 'book':
                    //charger controlleur book
                    break;
                default:
                    //erreur
                    break;        
            }
        }else{
            //charger la page d'accueil
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
            echo $e->getMessage();
        }
    }
}