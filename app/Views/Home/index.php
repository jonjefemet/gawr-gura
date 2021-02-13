<?php

use App\ChaldeaTools\SenkoSan\DataBases;

$data_bases = new Databases();

print_r($data_bases::getConnection('default'));

var_dump("pamsa");
// Show all information, defaults to INFO_ALL
phpinfo();

// Show just the module information.
// phpinfo(8) yields identical results.
phpinfo(INFO_MODULES);
