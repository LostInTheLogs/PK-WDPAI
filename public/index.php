<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Controller\DefaultController;
use App\Controller\ProjectController;
use App\Controller\ProfileController;
use App\Routing;

$routing = new Routing();

// TU BĘDZIEMY DEFINIOWAĆ WSZYSTKIE TRASY WYSTĘPUJĄCE W NASZYM PROJEKCIE
$routing->get('/profile', ProfileController::class, 'index');
$routing->get('/profile/{username}', ProfileController::class, 'show');
$routing->get('/projects', ProjectController::class, 'index');
$routing->get('/projects/{id:\d+}', ProjectController::class, 'show');
$routing->get('/', DefaultController::class, 'index');

$routeFound = $routing->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI'],
);

if (!$routeFound) {
    http_response_code(404);
    (new DefaultController())->notFound();
}
