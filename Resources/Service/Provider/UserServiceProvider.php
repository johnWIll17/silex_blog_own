<?php

namespace Resources\Service\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Resources\Model\UserModel;
use Resources\Service\UserService;

class UserServiceProvider implements ServiceProviderInterface {

    public function register(Application $app) {
        $app['user.service'] = $app->share(function() use ($app) {
            $user_model = new UserModel($app['db']);

            return new UserService($user_model);
        });
    }

    public function boot(Application $app) {}
}
