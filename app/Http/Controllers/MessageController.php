<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Auth;

class MessageController extends Controller
{
    public function index(){
        $users = User::where("id",'!=',Auth::id())->get();
        
return view("users",compact(["users"=>$users]));
    }
}
