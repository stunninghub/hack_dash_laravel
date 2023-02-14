<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class PostController extends BaseController
{
    public function insert(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('description');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $usr_id = Auth::user()->id;
        $data = array('title' => $title, "content" => $content, "created_at" => $created_at, "updated_at" => $updated_at, 'user_id' => $usr_id);
        if (DB::table('post')->insert($data)) {
            $user_id = Auth::user()->id;
            $posts = DB::table('post')->select('*')->where('user_id', '=', $user_id)->orderBy('id', 'DESC')->get();
            echo json_encode(array(
                "status"    => 200,
                "message"   => "Post published",
                "posts"     => $posts
            ));
        } else {
            echo json_encode(array(
                "status"    => 500,
                "message"   => "Post Not Published",
            ));
        }
    }
    public function get_posts(Request $request)
    {
        $user_id = Auth::user()->id;
        $posts = DB::table('post')->select('*')->where('user_id', '=', $user_id)->get();
        echo json_encode(array(
            "status"    => 200,
            "message"   => "Fetched Successfuly",
            "posts"   => $posts,
        ));
    }
    public static function get_all_posts($orderby = null, $limit = null, $user_id = null)
    {
        $orderby = $orderby ?: 'asc';
        $limit = $limit ?: -1;
        $user_id = $user_id ?: Auth::user()->id;
        return DB::table('post')->select('*')->where('user_id', '=', $user_id)->orderBy('id', $orderby)->limit($limit)->get();
    }
}
