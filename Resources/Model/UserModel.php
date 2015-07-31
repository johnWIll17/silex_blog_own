<?php

namespace Resources\Model;

use Doctrine\DBAL\Connection;
use Resources\Model\BaseModel;

class UserModel extends BaseModel {

    public function __construct(Connection $con) {
        parent::__construct($con, 'users');
    }
}

