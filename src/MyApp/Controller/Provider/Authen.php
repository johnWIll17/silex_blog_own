<?php

namespace MyApp\Controller\Provider;

use Silex\Application;
use Silex\ControllerProviderInterface;
use MyApp\Controller\AuthenController;

class Authen implements ControllerProviderInterface {

    public function connect(\Silex\Application $app) {

        $authen_controller = new AuthenController($app);

        $authens = $app['controllers_factory'];

        $authens->get('/login', array($authen_controller, 'loginAction'))
            ->bind('log_in');

        $authens->match('/logout', array($authen_controller, 'logoutAction'))
            ->method('post|delete')
            ->bind('log_out');

        $authens->match('/authen', array($authen_controller, 'authenUserAction'))
            ->method('post')
            ->bind('authen_user');

        return $authens;
    }
}
