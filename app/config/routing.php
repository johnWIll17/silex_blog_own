<?php

$app->get('/', function() {
    return 'home page';
});

use MyApp\Controller\Provider\Blog;
use MyApp\Controller\Provider\Authen;

$app->mount('/blogs', new MyApp\Controller\Provider\Blog());
$app->mount('/users', new MyApp\Controller\Provider\User());

$app->mount('', new MyApp\Controller\Provider\Authen());


// $app->get('/log_in', function() {
//     return 'you have logged in';
// });

//blog controllers
// $app['blog.controller'] = $app->share(function() use ($app) {
//     return new MyApp\Controller\BlogController($app);
// });
// $app->get('/blogs/', 'blog.controller:indexAction')
//     ->bind('blog');
//
// $app->get('/blogs/new', 'blog.controller:newAction')
//     ->bind('blog_new');
//
// $app->get('/blogs/{id}', 'blog.controller:showAction')
//     ->assert('id', '\d+')
//     ->bind('blog_show');
//
// $app->post('/blogs/', 'blog.controller:createAction')
//     ->bind('blog_create');
//
// $app->get('/blogs/{id}/edit', 'blog.controller:editAction')
//     ->bind('blog_edit');
//
// $app->match('/blogs/{id}', 'blog.controller:updateAction')
//     ->method('post|put')
//     ->bind('blog_update');
//
// $app->match('/blogs/{id}', 'blog.controller:destroyAction')
//     ->method('post|delete')
//     ->bind('blog_delete');
//
