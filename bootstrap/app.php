<?php

session_start();
require __DIR__ . '/../vendor/autoload.php';


$app = new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true,
             'db' => [
                'driver' => 'mysql',
                'host' => 'localhost',
                'database' => 'slim',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
        ]
        ],

]);
$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule){
    return $capsule;
};

$container['HomeController'] = function ($container) {

    return new \App\Controllers\HomeController($container);
};


require __DIR__ . '/../app/routes.php';

?>