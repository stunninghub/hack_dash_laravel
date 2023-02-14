<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;

class UserMeta extends BaseController
{
    public static function get($user_id = null)
    {
        $usr_id = Auth::user()->id;
        $ftchd_meta = array();
        $user_meta = DB::table('usermeta')->select('*')->where('user_id', $usr_id)->get();
        foreach ($user_meta as $meta) {
            $ftchd_meta[$meta->key] = $meta->value;
        }
        return $ftchd_meta;
    }
}
