<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 24/10/2018
 * Time: 13:11
 */

namespace App\Models\Social;


use App\Models\User;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class WallpaperReport extends Model
{

    use CrudTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wallpaper_reports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'wallpaper_id', 'text'
    ];

    /**
     * Return report's author
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Return reported wallpaper
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wallpaper()
    {
        return $this->belongsTo(Wallpaper::class, 'wallpaper_id');
    }

}