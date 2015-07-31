<?php

namespace MyApp\Controller\Provider;

use Silex\Application;
use Silex\ControllerProviderInterface;
use MyApp\Controller\BlogController;

class Blog implements ControllerProviderInterface {

    public function connect(\Silex\Application $app) {
        $blog_controller = new BlogController($app);

        $blogs = $app['controllers_factory'];

        $blogs->get('/', array($blog_controller, 'indexAction'))
            ->bind('blog');

        $blogs->post('/', array($blog_controller, 'createAction'))
            ->bind('blog_create');

        //$blogs->get('/new', 'MyApp\Controller\BlogController::newAction')
        $blogs->get('/new', array($blog_controller, 'newAction'))
            ->bind('blog_new');

        //$blogs->get('/{id}', 'MyApp\Controller\BlogController::showAction')
        $blogs->get('/{id}', array($blog_controller, 'showAction'))
            ->assert('id', '\d+')
            ->bind('blog_show');

        $blogs->get('/{id}/edit', array($blog_controller, 'editAction'))
            ->bind('blog_edit');

        $blogs->match('/{id}', array($blog_controller, 'updateAction'))
            ->method('post|put')
            ->bind('blog_update');

        $blogs->delete('/{id}', array($blog_controller, 'deleteAction'))
            ->method('post|delete')
            ->bind('blog_delete');


        return $blogs;
    }
}

