<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 9/29/18
 * Time: 11:32 AM
 */
require_once 'db.php';
require_once 'lib/functions.php';
use Iman\App\VA as VA;
use Iman\App\Models\VA as VA2;
use Iman\App\Models\CompanySpecification;
value_added_system_activate();
$company = new CompanySpecification();
$company->Create(array(
    'user_id' => 3,
    'address' => '  dffef   ',
    'economical_number' => 11221,
    'registration_number' => 122121212
));
dd(CompanySpecification::all());

