<?php

namespace App\Models\Spatie;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
//use Spatie\Activitylog\Traits\LogsActivity;
//use Spatie\ModelStatus\HasStatuses;

class Permission extends \Spatie\Permission\Models\Permission
{
    use CrudTrait;
//    use HasStatuses;
//    use LogsActivity;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    public $timestamps = true;
    // protected $hidden = [];
    protected $fillable = [
        'name',
        'guard_name',
        'updated_at',
        'created_at'
    ];
    protected $dates = ['created_at', 'updated_at'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @param string $name
     * @param string $reason
     * @return bool
     */
    public function isValidStatus(string $name, string $reason = '')
    {
        if ($name === 'active'
            || $name === 'not active') {
            return true;
        }
        return false;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
