<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 9/30/18
 * Time: 3:15 PM
 */
namespace  Iman\App\Seeding;

require_once '../../../../db.php';
use PragmaRX\Random\Random;
use Iman\App\Models\VAFactor;
use Iman\App\Models\VA;
use Iman\App\Models\CompanySpecification;

$random = new Random();
for($i = 1; $i < 50 ;$i++){
    $num = $random->numeric()->size(5)->get();
    $string = $random->uppercase()->size(32)->get();
    $text = $random->lowercase()->size(32)->get();
    $company = new CompanySpecification();
    echo 1;
    $company->Create(array(
        'user_id' => $num,
        'address' => $text,
        'economical_number' => $num,
        'registration_number' => $num
    ));
}

for($i = 1; $i < 50 ;$i++){
    $num = $random->numeric()->size(5)->get();
    $string = $random->uppercase()->size(32)->get();
    //$text = $random->lowercase()->size(32)->get(;
    $company = new VA();
    $company->Create(array(
        'user_id' => $num,
        'product_type' => $string,
        'product_id' => $num,
        'company_id' => $num,
        'factor_id' => $num,
    ));
}

for($i = 1; $i < 50 ;$i++){
    $num = $random->numeric()->size(5)->get();
    $string = $random->uppercase()->size(32)->get();
    //$text = $random->lowercase()->size(32)->get(;
    $company = new VAFactor();
    $company->Create(array(
        'user_id' => $num,
        'name' => $string,
    ));
}

