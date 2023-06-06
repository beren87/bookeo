<?php

namespace App\Controller;

Class Controller
{
    public function route(): void
    {
        if (isset($_GET['controller'])){
            switch ($_GET['controller']){
                case 'page':
                    //charger controlleur page
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
}