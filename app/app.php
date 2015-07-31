<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

//register service
require_once __DIR__.'/config/registerService.php';

//routing
require_once __DIR__.'/config/routing.php';

//$app->mount('/blogs', new MyApp\Controller\Provider\Blog());
//$app->mount('/blogs', include __DIR__.'/../src/MyApp/Controller/BlogController.php');



return $app;
