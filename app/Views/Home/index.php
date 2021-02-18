<?php

use App\Models\UserModel;

$user_model = new UserModel();

print_r($user_model->buildQueryWithDefaultFilters());