<?php


use Silex\Provider\FormServiceProvider;
//require_once __DIR__.'/../../Resources/Service/Provider/ArticleServiceProvider.php';

$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

//form
$app->register(new FormServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
//

//twig template
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../../Resources/views'
));
//

//Doctrine
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options'   => array(
        'dbname'   => 'silex_blog',
        'user'     => 'root',
        'password' => '',
        'host'     => 'localhost',
        'driver'   => 'pdo_mysql'
    )
));

$app->register(new Resources\Service\Provider\ArticleServiceProvider());
$app->register(new Resources\Service\Provider\UserServiceProvider());


$app['asset_path'] = 'http://localhost/blog/web/blogs/';
$app['asset_path'] .= '../asset/js/';


//session
$app->register(new Silex\Provider\SessionServiceProvider());



$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.messages' => array(),
));
