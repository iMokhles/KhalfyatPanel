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

class Category extends Model
{

    use CrudTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'parent_id'
    ];

    /**
     * Return category's parent if found
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

}