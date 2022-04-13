<?php 

namespace oShop\Controllers;

use oShop\Models\Type;
use oShop\Models\Brand;


class CoreController {
     // Fonction qui affiche le template voulu
    // Avec les données associées à ce template
    protected function show($viewName, $viewVars = []) {
        // $viewVars est disponible dans chaque fichier de vue
        global $router;

        $absoluteURL = $_SERVER['BASE_URI'];

        $brandModel = new Brand();
        $topFiveBrands = $brandModel->findTopFiveFooter();

        $typeModel = new Type();
        $topFiveTypes = $typeModel->findAllForFooter();

        // En-tête
        require __DIR__ . '/../views/header.tpl.php';
        // Inclusion du template pour rendu HTML renvoyé par le serveur
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        // Pied de page
        require __DIR__ . '/../views/footer.tpl.php';
    }
}