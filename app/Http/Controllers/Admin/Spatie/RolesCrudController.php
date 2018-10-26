<?php

namespace App\Http\Controllers\Admin\Spatie;

use Backpack\CRUD\app\Http\Controllers\CrudController;
//use App\Models\Security\Role;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Controllers\Admin\Requests\Spatie\RoleRequest as StoreRequest;
use App\Http\Controllers\Admin\Requests\Spatie\RoleRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Illuminate\Support\Facades\Cache;

/**
 * Class RolesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class RolesCrudController extends CrudController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:admin');
    }

    public function setup()
    {

        $role_model = config('permission.models.role');
        $permission_model = config('permission.models.permission');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel($role_model);
        $this->crud->setRoute('admin' . '/roles');
        $this->crud->setEntityNameStrings('Role', 'Roles');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->setColumns([
            [
                'name'  => 'name',
                'label' => trans('dashboard.name'),
                'type'  => 'text',
            ],
            [
                // n-n relationship (with pivot table)
                'label'     => ucfirst(trans('dashboard.permission_plural')),
                'type'      => 'select_multiple',
                'name'      => 'permissions', // the method that defines the relationship in your Model
                'entity'    => 'permissions', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => $permission_model, // foreign key model
                'pivot'     => true, // on create&update, do you need to add/delete pivot table entries?
            ],
        ]);

        $this->crud->addField([
            'name'  => 'name',
            'label' => trans('dashboard.name'),
            'type'  => 'text',
        ]);
        $this->crud->addField([
            'name'  => 'guard_name',
            'label' => trans('dashboard.guard_name'),
            'type'  => 'text',
            'value' => sm_current_guardName()
        ]);

        $this->crud->addField([
            'label'     => ucfirst(trans('dashboard.permission_plural')),
            'type'      => 'select2_multiple',
            'name'      => 'permissions',
            'entity'    => 'permissions',
            'attribute' => 'name',
            'model'     => $permission_model,
            'pivot'     => true,
        ]);

        // add asterisk for fields that are required in BannedIpsRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }



    public function store(StoreRequest $request)
    {
        //otherwise, changes won't have effect
        Cache::forget('spatie.permission.cache');

        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        //otherwise, changes won't have effect
        Cache::forget('spatie.permission.cache');

        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
