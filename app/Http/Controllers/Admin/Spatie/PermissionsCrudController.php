<?php

namespace App\Http\Controllers\Admin\Spatie;

use App\Models\Spatie\Permission;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Controllers\Admin\Requests\Spatie\PermissionRequest as StoreRequest;
use App\Http\Controllers\Admin\Requests\Spatie\PermissionRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * Class PermissionsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PermissionsCrudController extends CrudController
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
        $this->crud->setModel($permission_model);
        $this->crud->setRoute('admin' . '/permissions');
        $this->crud->setEntityNameStrings('Permission', 'Permissions');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */


        $this->crud->addColumn([
            'name'  => 'name',
            'label' => trans('dashboard.name'),
            'type'  => 'text',
        ]);
        $this->crud->addColumn([ // n-n relationship (with pivot table)
            'label'     => trans('dashboard.roles_have_permission'),
            'type'      => 'select_multiple',
            'name'      => 'roles',
            'entity'    => 'roles',
            'attribute' => 'name',
            'model'     => $role_model,
            'pivot'     => true,
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
            'label'     => trans('dashboard.roles'),
            'type'      => 'select2_multiple',
            'name'      => 'roles',
            'entity'    => 'roles',
            'attribute' => 'name',
            'model'     => $role_model,
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
