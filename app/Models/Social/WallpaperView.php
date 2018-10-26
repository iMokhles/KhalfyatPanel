<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 24/10/2018
 * Time: 13:11
 */

namespace App\Models\Social;


use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class WallpaperView extends Model
{

    use CrudTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wallpaper_views';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'wallpaper_id', 'ip', 'views'
    ];

    /**
     * Return wallpaper
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wallpaper()
    {
        return $this->belongsTo(Wallpaper::class, 'wallpaper_id');
    }

}