<?php

namespace App\Models;

use App\ChaldeaTools\SenkoSan\Kitsune;

class UserModel extends Kitsune
{
    public function __construct()
    {
        parent::__construct("user");
    }

    public function getColumns(): array
    {
        return [
            "id_user",
            "first_name",
            "last_name",
            "status",
        ];
    }
}
