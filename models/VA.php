<?php
require __DIR__.'/../vendor/autoload.php';

/**
 * Created by PhpStorm.
 * User: iman
 * Date: 9/23/18
 * Time: 3:41 PM
 */

namespace models;
use Illuminate\Database\Eloquent\model;


class VA extends model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'VA-main';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that  be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','product_type', 'product_id', 'company_id', 'factor_id'];

}