<?php

namespace App\Repositories;
use App\User;

class UserRepository extends Repository{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}