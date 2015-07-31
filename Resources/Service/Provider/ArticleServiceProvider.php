<?php

namespace Resources\Service\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Resources\Model\ArticleModel;
use Resources\Service\ArticleService;

class ArticleServiceProvider implements ServiceProviderInterface {

    public function register(Application $app) {
        $app['article.service'] = $app->share(function() use ($app) {
            $article_model = new ArticleModel($app['db']);

            return new ArticleService($article_model);
        });
    }

    public function boot(Application $app) {}
}
