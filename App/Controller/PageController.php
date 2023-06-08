<?php

namespace App\Controller;

Class PageController extends Controller
{
    public function route(): void
    {
        try {

            if (isset($_GET['action'])){
                switch ($_GET['action']){
                    case 'about':
                        //On appelle la méthode about()
                        $this->about();
                        break;
                    case 'home':
                        //charge controller homme
                        $this->home();
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

    /*
        Exemple d'appel depuis l'url
        ?controller=page&action=about
    */
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

    /*
        Exemple d'appel depuis l'url
        ?controller=page&action=home
    */
    protected function home()
    {
        $this->render('page/home', [
            
        ]);
    }

}