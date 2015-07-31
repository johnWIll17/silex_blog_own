<?php

namespace Resources\Model;

use Doctrine\DBAL\Connection;
use Resources\Model\BaseModel;

class ArticleModel extends BaseModel {

    public function __construct(Connection $con) {
        parent::__construct($con, 'articles');
    }
}

