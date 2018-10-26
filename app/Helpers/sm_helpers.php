<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 19/10/2018
 * Time: 03:30
 */


if (!function_exists('sm_auth')) {

    function sm_auth($guard = null)
    {
        if (is_null($guard)) {
            return auth()->guard();
        }
        return \Illuminate\Support\Facades\Auth::guard($guard);
    }
}

if (!function_exists('sm_admin_url')) {

    function sm_admin_url($path = null)
    {
        return backpack_url('/admin/'.$path);
    }
}

if (!function_exists('sm_current_guardName')) {

    function sm_current_guardName()
    {
        if(sm_auth('admin')->check()) {
            return "admin";
        } elseif(sm_auth('user')->check()) {
            return "user";
        } elseif(sm_auth('web')->check()) {
            return "web";
        }
    }
}