<?php

namespace App\Models;

use App\ChaldeaTools\SenkoSan\Kitsune;

class UserModel extends Kitsune
{
    public function __construct()
    {
        parent::__construct("user");
    }
}
