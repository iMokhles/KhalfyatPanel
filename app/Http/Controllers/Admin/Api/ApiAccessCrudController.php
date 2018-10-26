<?php

namespace App\Http\Controllers\Admin\Api;


// VALIDATION: change the requests to match your own file names if you need form validation
use App\Models\Api\ApiAccess;
use App\Models\Api\ApiClient;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\CrudPanel;

/**
 * Class ApiAccessCrudController
 * @package App\Http\Controllers\Admin\Social
 * @property-read CrudPanel $crud
 */
class ApiAccessCrudController extends CrudController
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
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel(ApiAccess::class);
        $this->crud->setRoute('admin' . '/api_access');
        $this->crud->setEntityNameStrings('Api Access', 'Api Accesses');
        $this->crud->denyAccess(['create', 'edit']);

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */


        // Columns.
        $this->crud->setColumns([
            [
                'name'  => 'user_id',
                'label' => trans('dashboard.user'),
                'type'  => 'select',
                'entity' => 'user', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
            ],
            [
                'name'  => 'api_client_id',
                'label' => trans('dashboard.client'),
                'type'  => 'select',
                'entity' => 'client', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
            ],

        ]);

        // Fields
        $this->crud->addFields([
            [
                'name'  => 'user_id',
                'label' => trans('dashboard.user'),
                'type'  => 'select2',
                'entity' => 'category', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => User::class, // foreign key model
            ],
            [
                'name'  => 'api_client_id',
                'label' => trans('dashboard.client'),
                'type'  => 'select2',
                'entity' => 'client', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => ApiClient::class, // foreign key model
            ],
        ]);
    }
}
