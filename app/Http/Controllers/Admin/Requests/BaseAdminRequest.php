<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 16/10/2018
 * Time: 20:24
 */

namespace App\Http\Controllers\Admin\Requests;


use Illuminate\Foundation\Http\FormRequest;

class BaseAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

}