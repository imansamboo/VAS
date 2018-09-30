<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 9/27/18
 * Time: 3:36 PM
 */
require "vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'whmcs',
    'username'  => 'whmcs',
    'password'  => 'whmcs@#$',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();