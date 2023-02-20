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
        if ($id = DB::table('post')->insertGetId($data)) {
            $user_id = Auth::user()->id;
            // $posts = DB::table('post')->select('*')->where('user_id', '=', $user_id)->orderBy('id', 'DESC')->get();
            // $posts = DB::table('post')->select('LAST_INSERT_ID;')->where('user_id', '=', $user_id)->orderBy('id', 'DESC')->get();
            echo json_encode(array(
                "status"    => 200,
                "message"   => "Post published",
                "id"     => $id
            ));
        } else {
            echo json_encode(array(
                "status"    => 500,
                "message"   => "Post Not Published",
            ));
        }
    }
    public function update(Request $request)
    {
        $post_id = $request->input('post_id');
        $title = $request->input('title');
        $content = $request->input('description');
        $updated_at = date('Y-m-d H:i:s');
        $usr_id = Auth::user()->id;
        $data = array('title' => $title, "content" => $content,  "updated_at" => $updated_at);
        if ($id = DB::table('post')->where('id', '=', $post_id)->update($data)) {
            echo json_encode(array(
                "status"    => 200,
                "message"   => "Post updated"
            ));
        } else {
            echo json_encode(array(
                "status"    => 500,
                "message"   => "Post Not Updated",
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


    public function delete(Request $request)
    {
        $post_id = $request->input('post_id');
        if (DB::table('post')->where('id', '=', $post_id)->delete()) {
            return array(
                "status"    => 200,
                "message"   => "Post has been removed."
            );
        } else {
            return array(
                "status"    => 500,
                "message"   => "Post not removed.",
                "data"      => $post_id
            );
        }
    }


    /********************************
     * STATIC METHODS START
     */
    public static function is_post_authorized($user_id, $post_id)
    {
        $user_id = Auth::user()->id;
        $posts = DB::table('post')->select('*')->where('id', '=', $post_id)->where('user_id', '=', $user_id)->get();
        if ($posts) {
            return array(
                "status"    => 200,
                "message"   => "Authorized",
            );
        } else {
            return array(
                "status"    => 400,
                "message"   => "Not Authorized",
            );
        }
    }
    public static function get_all_posts($orderby = null, $limit = null, $user_id = null)
    {
        $orderby = $orderby ?: 'asc';
        $limit = $limit ?: -1;
        $user_id = $user_id ?: Auth::user()->id;
        return DB::table('post')->select('*')->where('user_id', '=', $user_id)->orderBy('id', $orderby)->limit($limit)->get();
    }
    public static function get_post_by_id($id)
    {
        $user_id = Auth::user()->id;
        $post = DB::table('post')->select('*')->where('user_id', '=', $user_id)->where('id', '=', $id)->get();
        return array(
            "status"    => 200,
            "message"   => "Fetched Successfuly",
            "post"   => $post,
            "user_id" => $user_id
        );
    }
    /**
     * STATIC METHODS START END
     ********************************/
}
