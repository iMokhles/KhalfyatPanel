<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 24/10/2018
 * Time: 13:11
 */

namespace App\Models\Social;


use App\Traits\IMCrudTrait;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Wallpaper extends Model
{


    use CrudTrait;
    use IMCrudTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wallpapers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'size', 'resolution' ,'active'
    ];

    /**
     * Return wallpaper's category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function categories()
    {
        return $this->hasOne(Category::class, 'wallpaper_id');
    }

    /**
     * Return wallpaper's likes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function likes()
    {
        return $this->hasMany(WallpaperLike::class, 'wallpaper_id');
    }

    /**
     * Return wallpaper's comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function comments()
    {
        return $this->hasMany(WallpaperComment::class, 'wallpaper_id');
    }

    /**
     * Return wallpaper's reports
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function reports()
    {
        return $this->hasMany(WallpaperReport::class, 'wallpaper_id');
    }

    /**
     * Return wallpaper's downloads
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function downloads()
    {
        return $this->hasMany(WallpaperDownload::class, 'wallpaper_id');
    }

    /**
     * Return wallpaper's views
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function views()
    {
        return $this->hasMany(WallpaperView::class, 'wallpaper_id');
    }

}