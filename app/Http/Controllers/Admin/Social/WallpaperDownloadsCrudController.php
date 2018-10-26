<?php

namespace App\Http\Controllers\Admin\Social;


// VALIDATION: change the requests to match your own file names if you need form validation
use App\Models\Social\Wallpaper;
use App\Models\Social\WallpaperDownload;
use App\Models\Social\WallpaperReport;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\CrudPanel;

/**
 * Class WallpaperDownloadsCrudController
 * @package App\Http\Controllers\Admin\Social
 * @property-read CrudPanel $crud
 */
class WallpaperDownloadsCrudController extends CrudController
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
        $this->crud->setModel(WallpaperDownload::class);
        $this->crud->setRoute('admin' . '/wallpaper_downloads');
        $this->crud->setEntityNameStrings('Wallpaper Download', 'Wallpaper Downloads');

        $this->crud->denyAccess(['create', 'edit']);
        $this->crud->allowAccess(['show']);
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */


        // Columns.
        $this->crud->setColumns([
            [
                'name'  => 'wallpaper_id',
                'label' => trans('dashboard.wallpaper'),
                'type'  => 'select',
                'entity' => 'wallpaper', // the method that defines the relationship in your Model
                'attribute' => 'title', // foreign key attribute that is shown to user
            ],
            [
                'name'  => 'text',
                'label' => trans('dashboard.ip'),
                'type'  => 'text',
            ],
            [
                'name'  => 'text',
                'label' => trans('dashboard.downloads'),
                'type'  => 'text',
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
                'name'  => 'text',
                'label' => trans('dashboard.ip'),
                'type'  => 'text',
            ],
            [
                'name'  => 'downloads',
                'label' => trans('dashboard.downloads'),
                'type'  => 'text',
            ]
        ]);
    }

}
