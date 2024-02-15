<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AjaxController extends Controller {
    public function index(Request $request) 
    {
        $name = $request->name;
        if($name == "") return response(['msg'=>""],200);

        if (preg_match('/[0-9]/', $name)) {
            return response(['msg'=>"Invalid name"],200);
        }
        return response(['msg'=>""],200);
    }
    public function store(Request $request) 
    {
        $email = $request->email;

        if(preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email) || strlen($email)==0){
            return response(['msg'=>"",200]);
        }
        return response(['msg'=>"Invalid Email", 200]);
    }
}
