<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AjaxController extends BaseController
{
    public function insertform()
    {
        return view('stud_create');
    }
    public function insert(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $data = array('title' => $title, "content" => $content);
        DB::table('post')->insert($data);
        echo "Record inserted successfully.<br />";
        echo '<a href="/insert">Click Here</a> to go back.';
    }


    public function hd_login(Request $request)
    {
        $credentials = $request->validate([
            "username"  => ['required'],
            "password"  => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return array(
                "status"    => 200,
                "message"   => "Logged In.",
                "redirect"   => "/"
            );
        } else {
            return array(
                "status"    => 500,
                "message"   => "Not logged In."
            );
        }
    }

    public function hd_register(Request $request)
    {
        // User::create([
        //     'fullname'  => $request->input('fullname'),
        //     'username'  => $request->input('username'),
        //     'email'  => $request->input('email'),
        //     'password'  => $request->input('password'),
        // ]);
        $user = new User();
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->name = $request->input('fullname');
        $user->metadata = '';
        if ($user->save()) {
            // $credentials = $request->validate([
            //     "username"  => $request->input('username'),
            //     "password"  => Hash::make($request->input('password')),
            // ]);
            // if (Auth::attempt($credentials)) {
            //     $request->session()->regenerate();
            return array(
                "status"    => 200,
                "message"   => "Logged In.",
                "redirect"   => "/"
            );
            // } else {
            //     return array(
            //         "status"    => 500,
            //         "message"   => "Not logged In."
            //     );
            // }
        } else {
            return array(
                "status"    => 500,
                "message"   => "Registeration unsuccessful."
            );
        }
    }

    public function delete_user(Request $request)
    {
        $user_id = $request->input('user_id');
        if (DB::table('users')->where('id', '=', $user_id)->delete()) {
            return array(
                "status"    => 200,
                "message"   => "User has been removed."
            );
        } else {
            return array(
                "status"    => 500,
                "message"   => "User not removed."
            );
        }
    }

    public function generate_api_token(Request $request)
    {
        $user_id = Auth::user()->id;
        $api_token = md5(uniqid('hack_api_').time());
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        $existing_api_res = DB::table('hack_dash_apis')->select('api_token')->where('user_id', '=', $user_id)->get('api_token');

        if(isset($existing_api_res[0])){
            $data = array("api_token" => $api_token, "updated_at" => $updated_at);
            if ($id = DB::table('hack_dash_apis')->where('user_id', '=', $user_id)->update($data)) {
                echo json_encode(array(
                    "status"    => 200,
                    "message"   => "Token updated",
                    "id"        => $id,
                    "token"     => $api_token
                ));
            }
        } else {
            $data = array('user_id' => $user_id, "api_token" => $api_token, "created_at" => $created_at, "updated_at" => $updated_at);
            if ($id = DB::table('hack_dash_apis')->insertGetId($data)) {
                echo json_encode(array(
                    "status"    => 200,
                    "message"   => "Token generated",
                    "id"        => $id,
                    "token"     => $api_token
                ));
            } else {
                echo json_encode(array(
                    "status"    => 500,
                    "message"   => "Token failed to generate",
                ));
            }
        }
    }

    public static function get_current_api_token()
    {
        $user_id = Auth::user()->id;
        $api_token_res = DB::table('hack_dash_apis')->select('api_token')->where('user_id', '=', $user_id)->get('api_token');
        if(isset($api_token_res[0])){
            return $api_token_res[0]->api_token;
        }else{
            return '';
        }
        // return json_encode(array(
        //     "status"    => 200,
        //     "message"   => "Fetched Successfuly",
        //     "posts"   => $api_token,
        // ));
    }
}
