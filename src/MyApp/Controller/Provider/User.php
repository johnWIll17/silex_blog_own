<?php

namespace MyApp\Controller\Provider;

use Silex\Application;
use Silex\ControllerProviderInterface;
use MyApp\Controller\UserController;


class User implements ControllerProviderInterface {

    public function connect(\Silex\Application $app) {
        $user_controller = new UserController($app);

        $users = $app['controllers_factory'];

        $users->get('/new', array($user_controller, 'newAction'))
            ->bind('user_new');

        $users->post('/', array($user_controller, 'createAction'))
            ->bind('user_create');

        $users->get('/{id}/edit', array($user_controller, 'editAction'))
            ->bind('user_edit');

        $users->match('/{id}', array($user_controller, 'updateAction'))
            ->method('post|put')
            ->bind('user_update');

        return $users;
    }
}
