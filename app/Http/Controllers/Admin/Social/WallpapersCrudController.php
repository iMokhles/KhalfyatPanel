<?php

namespace App\Http\Controllers\Admin\Social;


// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Controllers\Admin\Requests\Social\WallpaperRequest as StoreRequest;
use App\Http\Controllers\Admin\Requests\Social\WallpaperRequest as UpdateRequest;
use App\Models\Social\Wallpaper;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\CrudPanel;

/**
 * Class WallpapersCrudController
 * @package App\Http\Controllers\Admin\Social
 * @property-read CrudPanel $crud
 */
class WallpapersCrudController extends CrudController
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
        $this->crud->setModel(Wallpaper::class);
        $this->crud->setRoute('admin' . '/wallpapers');
        $this->crud->setEntityNameStrings('Wallpaper', 'Wallpapers');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */


        // Columns.
        $this->crud->setColumns([
            [
                'name'  => 'title',
                'label' => trans('dashboard.title'),
                'type'  => 'text',
            ],
            [
                'name'  => 'size',
                'label' => trans('dashboard.size'),
                'type'  => 'text',
            ],
            [
                'name'  => 'resolution',
                'label' => trans('dashboard.resolution'),
                'type'  => 'text',
            ],
            [
                'name' => 'active',
                'label' => trans('dashboard.active'),
                'type' => "model_function",
                'function_name' => 'getActiveFunction',
                'limit'         => 200
            ]
        ]);

        // Fields
        $this->crud->addFields([
            [
                'name'  => 'title',
                'label' => trans('dashboard.title'),
                'type'  => 'text',
            ],
            [
                'name'  => 'size',
                'label' => trans('dashboard.size'),
                'type'  => 'text',
            ],
            [
                'name'  => 'resolution',
                'label' => trans('dashboard.resolution'),
                'type'  => 'text',
            ],
            [
                'name'  => 'active',
                'label' => trans('dashboard.active'),
                'type'  => 'checkbox',
            ],
        ]);

        // add asterisk for fields that are required in BannedIpsRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
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
