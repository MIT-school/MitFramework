<?php
$container = new \Slim\Container;

$container = $app->getContainer();
$container['db'] = function ($c) {
    $setting = $c->get('settings')['db'];
    $config = new \Doctrine\DBAL\Configuration();
    $connectionParams = array(
        'dbname' => $setting['name'],
        'user' => $setting['user'],
        'password' => $setting['pass'],
        'host' => $setting['host'],
        'driver' => 'pdo_mysql',
    );
    $connection = \Doctrine\DBAL\DriverManager::getConnection(
        $connectionParams,
        $config
    );
    return $connection->createQueryBuilder();
};

$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new \Slim\Views\Twig($settings['view']['view_path'], 
        $settings['view']['twig']);
    
    $view->addExtension(new Slim\Views\TwigExtension($c->router, $c->request->getUri()));

    $view->getEnvironment()->addGlobal('old', $_SESSION['old']);
    unset($_SESSION['old']);
    $view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);
    unset($_SESSION['errors']);

    return $view;
};

$container['validation'] = function ($c) {
    $settings = $c->get('settings');
    $param = $c['request']->getParams();
    $lang = $settings['lang'];

    return new \Valitron\Validator($param, [], $lang['default']);
};

