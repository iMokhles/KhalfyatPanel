<?php

namespace App\Http\Controllers\Admin\Social;


// VALIDATION: change the requests to match your own file names if you need form validation
use App\Models\Social\Wallpaper;
use App\Models\Social\WallpaperLike;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\CrudPanel;

/**
 * Class WallpaperLikesCrudController
 * @package App\Http\Controllers\Admin\Social
 * @property-read CrudPanel $crud
 */
class WallpaperLikesCrudController extends CrudController
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
        $this->crud->setModel(WallpaperLike::class);
        $this->crud->setRoute('admin' . '/wallpaper_likes');
        $this->crud->setEntityNameStrings('Wallpaper Like', 'Wallpaper Likes');

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
                'name'  => 'wallpaper_id',
                'label' => trans('dashboard.wallpaper'),
                'type'  => 'select',
                'entity' => 'wallpaper', // the method that defines the relationship in your Model
                'attribute' => 'title', // foreign key attribute that is shown to user
            ]
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
                'name'  => 'user_id',
                'label' => trans('dashboard.user'),
                'type'  => 'select2',
                'entity' => 'category', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => User::class, // foreign key model
            ],
        ]);
    }

}
