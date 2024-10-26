<?php

namespace app;

use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use DI\Container;

class load
{
    private $app;
    private $twig;

    public function __construct()
    {
        // Cria o container de injeção de dependências
        $container = new Container();

        // Configura o container no Slim
        AppFactory::setContainer($container);
        
        // Cria a aplicação Slim
        $this->app = AppFactory::create();

        // Configura o Twig para renderização de templates
        $this->twig = Twig::create('templates', ['cache' => false]);
        $container->set('view', $this->twig);

        // Adiciona o middleware do Twig
        $this->app->add(TwigMiddleware::createFromContainer($this->app, 'view'));
    }

    // Método para obter a instância do aplicativo Slim
    public function getApp()
    {
        return ['app' => $this->app, 'twig' => $this->twig];
    }
}
