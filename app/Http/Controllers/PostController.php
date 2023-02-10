<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as BaseController;

class PostController extends BaseController
{
    public function insert(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('description');
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $data = array('title' => $title, "content" => $content, "created_at" => $created_at, "updated_at" => $updated_at);
        if (DB::table('post')->insert($data)) {
            $posts = DB::table('post')->select('*')->get();
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
        $posts = DB::table('post')->select('*')->get();
        echo json_encode(array(
            "status"    => 200,
            "message"   => "Fetched Successfuly",
            "posts"   => $posts,
        ));
    }
}
