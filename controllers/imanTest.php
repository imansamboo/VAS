<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 9/27/18
 * Time: 4:58 PM
 */
namespace controllers;
echo 1;
require __DIR__ . '/../vendor/autoload.php';
echo 2;
use models\VA;
echo 3;
$va = new VA();
echo 4;
dd($va);