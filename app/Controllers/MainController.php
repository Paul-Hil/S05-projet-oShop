<?php

namespace oShop\Controllers;

// Gestion de nos pages

class MainController extends CoreController
{
    // Page d'accueil
    public function home()
    {
        // On appelle la méthode qui affiche le template
        $this->show('home');
    }

    public function legalNotice()
    {
        $this->show('legalNotice');
    }
}