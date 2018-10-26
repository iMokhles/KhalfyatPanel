<?php

namespace App\Http\Controllers\Admin\Social;


// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Controllers\Admin\Requests\Social\CategoryRequest as StoreRequest;
use App\Http\Controllers\Admin\Requests\Social\CategoryRequest as UpdateRequest;
use App\Models\Social\Category;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\CrudPanel;

/**
 * Class CategoriesCrudController
 * @package App\Http\Controllers\Admin\Social
 * @property-read CrudPanel $crud
 */
class CategoriesCrudController extends CrudController
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
        $this->crud->setModel(Category::class);
        $this->crud->setRoute('admin' . '/categories');
        $this->crud->setEntityNameStrings('Category', 'Categories');

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
                'name'  => 'slug',
                'label' => trans('dashboard.slug'),
                'type'  => 'text',
            ],
            [
                'name'  => 'parent_id',
                'label' => trans('dashboard.parent'),
                'type'  => 'select',
                'entity' => 'parent', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
            ],
        ]);

        // Fields
        $this->crud->addFields([
            [
                'name'  => 'name',
                'label' => trans('dashboard.name'),
                'type'  => 'text',
            ],
            [
                'name'  => 'slug',
                'label' => trans('dashboard.slug'),
                'type'  => 'text',
            ],
            [
                'name'  => 'parent_id',
                'label' => trans('dashboard.parent'),
                'type'  => 'select2',
                'entity' => 'parent', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => Category::class, // foreign key model
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
