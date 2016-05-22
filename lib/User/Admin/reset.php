<?php
ini_set("display_errors", "1"); // debug
error_reporting(-1);

require '../../../vendor/autoload.php';
require '../../../config.php';

\Base\DB::registerIlluminate($db_settings);

$login = new \Tinitter\Model\Login;
$login->where('id',1)->delete();
$login->id = 1;
$login->name = $argv[1];
$login->pass = password_hash($argv[2], PASSWORD_DEFAULT) ;
$login->save();

