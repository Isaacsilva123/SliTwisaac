<?php

require __DIR__ . './vendor/autoload.php';

use app\load;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

$loader = new load();
$appData = $loader->getApp();
$app = $appData['app'];
$twig = $appData['twig'];

$app->get("/", function (Request $request, Response $response) use ($twig) {
    return $twig->render($response, "index.html", [
        'title' => 'Bem vindo ao SliTwisaac',
        'content' => 'Desenvolvido por Isaac'
    ]);
});

$app->run();
