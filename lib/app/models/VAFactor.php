<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 9/23/18
 * Time: 3:41 PM
 */
namespace App\Models;
use Illuminate\Database\Eloquent\model;


class VAFactor extends model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'VA-factor';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','name', 'company_id'];

}