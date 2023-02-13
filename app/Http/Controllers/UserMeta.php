<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;

class UserMeta extends BaseController
{
    public static function get($key = null)
    {
        $usr_id = Auth::user()->id;
        $user_meta = DB::table('usermeta')->select('*')->where('user_id', $usr_id)->where('key', $key)->get();
        return $user_meta;
    }
}
