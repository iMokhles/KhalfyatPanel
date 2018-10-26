<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 24/10/2018
 * Time: 13:11
 */

namespace App\Models\Api;


use App\Models\User;
use App\Traits\IMCrudTrait;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class ApiAccess extends Model
{

    use CrudTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'api_access';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'api_client_id'
    ];

    /**
     * Return accessed user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Return accessed client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(ApiClient::class, 'api_client_id');
    }

}