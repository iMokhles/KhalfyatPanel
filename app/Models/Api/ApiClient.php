<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 24/10/2018
 * Time: 13:11
 */

namespace App\Models\Api;


use App\Traits\IMCrudTrait;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class ApiClient extends Model
{

    use CrudTrait;
    use IMCrudTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'api_clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'secret', 'version', 'revoked'
    ];

}