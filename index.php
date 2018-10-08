<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 9/29/18
 * Time: 11:32 AM
 */
require_once 'db.php';
use App\VA as VA;
use App\Models\VA as VA2;
use App\Models\CompanySpecification;
new VA();
echo 'yes';
new VA2();
echo 'yes';

$company = new CompanySpecification();
echo 'yes';

$company->Create(array(
    'user_id' => 3,
    'address' => '  dffef   ',
    'economical_number' => 11221,
    'registration_number' => 122121212
));
echo 'yes';

dd(CompanySpecification::all());

