<?php

namespace App\Http\Controllers\Admin\Social;


// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Controllers\Admin\Requests\Social\WallpaperCategoryRequest as StoreRequest;
use App\Http\Controllers\Admin\Requests\Social\WallpaperCategoryRequest as UpdateRequest;
use App\Models\Social\Category;
use App\Models\Social\Wallpaper;
use App\Models\Social\WallpaperCategory;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\CrudPanel;

/**
 * Class WallpaperCategoriesCrudController
 * @package App\Http\Controllers\Admin\Social
 * @property-read CrudPanel $crud
 */
class WallpaperCategoriesCrudController extends CrudController
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
        $this->crud->setModel(WallpaperCategory::class);
        $this->crud->setRoute('admin' . '/wallpaper_categories');
        $this->crud->setEntityNameStrings('Wallpaper Category', 'Wallpaper Categories');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */


        // Columns.
        $this->crud->setColumns([
            [
                'name'  => 'category_id',
                'label' => trans('dashboard.category'),
                'type'  => 'select',
                'entity' => 'category', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
            ],
            [
                'name'  => 'wallpaper_id',
                'label' => trans('dashboard.wallpaper'),
                'type'  => 'select',
                'entity' => 'wallpaper', // the method that defines the relationship in your Model
                'attribute' => 'title', // foreign key attribute that is shown to user
            ],
        ]);

        // Fields
        $this->crud->addFields([
            [
                'name'  => 'wallpaper_id',
                'label' => trans('dashboard.wallpaper'),
                'type'  => 'select2',
                'entity' => 'wallpaper', // the method that defines the relationship in your Model
                'attribute' => 'title', // foreign key attribute that is shown to user
                'model' => Wallpaper::class, // foreign key model
            ],
            [
                'name'  => 'category_id',
                'label' => trans('dashboard.category'),
                'type'  => 'select2',
                'entity' => 'category', // the method that defines the relationship in your Model
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
