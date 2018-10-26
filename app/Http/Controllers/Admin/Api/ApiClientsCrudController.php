<?php

namespace App\Http\Controllers\Admin\Api;


// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Controllers\Admin\Requests\Api\ApiClientRequest as UpdateRequest;
use App\Models\Api\ApiClient;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\CrudPanel;

/**
 * Class ApiClientsCrudController
 * @package App\Http\Controllers\Admin\Social
 * @property-read CrudPanel $crud
 */
class ApiClientsCrudController extends CrudController
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
        $this->crud->setModel(ApiClient::class);
        $this->crud->setRoute('admin' . '/api_clients');
        $this->crud->setEntityNameStrings('Api Client', 'Api Clients');
        $this->crud->denyAccess(['edit']);

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */


        // Columns.
        $this->crud->setColumns([
            [
                'name'  => 'name',
                'label' => trans('dashboard.name'),
                'type'  => 'text',
            ],
            [
                'name'  => 'secret',
                'label' => trans('dashboard.secret'),
                'type'  => 'text',
            ],
            [
                'name'  => 'version',
                'label' => trans('dashboard.version'),
                'type'  => 'text',
            ],
            [
                'name' => 'revoked',
                'label' => trans('dashboard.revoked'),
                'type' => "model_function",
                'function_name' => 'getRevokedFunction',
                'limit'         => 200
            ]

        ]);

        // Fields
        $this->crud->addFields([
            [
                'name'  => 'revoked',
                'label' => trans('dashboard.revoked'),
                'type'  => 'checkbox',
            ]
        ]);

        // add asterisk for fields that are required in BannedIpsRequest
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

}
