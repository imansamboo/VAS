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
use Illuminate\View;

use App\Controllers\CompanySpecificationController;

$company = new CompanySpecificationController;
$company->index();



