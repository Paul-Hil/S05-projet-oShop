<?php

// Autoload du composer
require __DIR__ . '/../vendor/autoload.php';


// Récupérer le paramètre GET "page" de l'URL
// Il nous indique la page/vue à afficher, donc le template à utiliser

if (isset($_GET['page'])) {
    // Page présente dans l'URL
    $page = $_GET['page'];
} else {
    // Sinon, page par défaut = index.php
    $page = '/';
}

$router = new AltoRouter();
$router->setBasePath($_SERVER['BASE_URI']);

$router->map(
    'GET',
    '/',
    [
        'controller' => 'oShop\Controllers\MainController',
        'method' => 'home',
    ],
    'home'
);

$router->map(
    'GET',
    '/mentions-legales/',
    [
        'controller' => 'oShop\Controllers\MainController',
        'method' => 'legalNotice',
    ],
    'legal notice'
);

$router->map(
    // Méthode HTTP
    'GET',
    // La motif de l'URL (la route)
    '/catalogue/categorie/[i:id]',
    // Destination de la route
    [
        'controller' => 'oShop\Controllers\CatalogController',
        'method' => 'category',
    ],
    // Nom interne de la route
    'category'
);

$router->map(
    'GET',
    '/catalogue/type/[i:id]',
    [
        'controller' => 'oShop\Controllers\CatalogController',
        'method' => 'type',
    ],
    'type'
);

$router->map(
    'GET',
    '/catalogue/marque/[i:id]',
    [
        'controller' => 'oShop\Controllers\CatalogController',
        'method' => 'marque',
    ],
    'marque'
);

$router->map(
    'GET',
    '/catalogue/produit/[i:id]',
    [
        'controller' => 'oShop\Controllers\CatalogController',
        'method' => 'product',
    ],
    'product'
);

$match = $router->match();
if ($match !== false) {

    // Destination de la route
    $destination = $match['target'];

    // On détermine le contrôleur à appeler
    $controllerName = $destination['controller'];
    // On détermine la méthode à appeler
    $methodName = $destination['method'];

    // Dispatcher

    // 1. On instancie notre contrôleur
    $controller = new $controllerName(); // Par ex. new MainController()

    // 2. On appelle la méthode souhaitée du contrôleur
    $controller->$methodName($match['params']); // Par ex. ->home();
} else {
    http_response_code(404);
    echo 'Er404 : Page not found';
}
