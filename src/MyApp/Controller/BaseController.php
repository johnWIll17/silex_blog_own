<?php

namespace MyApp\Controller;

use Silex\Application;

class BaseController {

    protected $app;

    public function __construct(Application $app) {
        $this->app = $app;
    }
}

