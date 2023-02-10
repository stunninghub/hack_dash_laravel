<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as BaseController;

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
}
