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

class WallpaperDownload extends Model
{

    use CrudTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wallpaper_downloads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'wallpaper_id', 'ip', 'downloads'
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