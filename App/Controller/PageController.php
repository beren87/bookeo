<?php

namespace App\Controller;

Class PageController extends Controller
{
    public function route(): void
    {
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'about':
                    //On appelle la méthode about()
                    $this->about();
                    break;
                case 'home':
                    //charge controller homme
                    break;
                default:
                    //erreur
                    break;        
            }
        }else{
            //charger la page d'accueil
        }
    }

    protected function about()
    {
        $params = [
            'test' => 'abc',
            'test2' => 'abc2'
        ];

        $this->render('page/about', $params);
       

        /* ou comme avec Symfony

        $this->render('page/about', [
            'test' => 'abc',
            'test2' => 'abc2'
        ]);
        
        */
    }
}