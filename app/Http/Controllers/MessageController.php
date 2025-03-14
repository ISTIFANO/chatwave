<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Models\User;
use App\Models\Message;

use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Auth;

class MessageController extends Controller
{
    public function index(){
        $users = User::where("id",'!=',Auth::id())->get();
        
return view("users",compact(["users"=>$users]));
    }

    public function chat(Request $request){
$receiver_id =$request->receiver_id;
$user = User::find($request->receiver_id);

$message = Message::where(function ($query) use ($receiver_id) {
$query->where("sender_id",'=',Auth::id())->where("receiver_id",'=',$receiver_id);

     })->orWhere(function ($query) use ($receiver_id){

        $query->where("sender_id",'=',$receiver_id)->where("receiver_id",'=',Auth::id());

     });
     return view('', compact('receiver', 'messages'));

    }
    public function sendMessage(Request $request){
        $message = Message::create([
            'sender_id'     => Auth::id(),
            'receiver_id'   => $request->receiverId,
            'message'       => $request['message']
        ]);

        broadcast(new MessageSend($message))->toOthers();
        
        return response()->json(['status' => 'Message sent succ']);

    }
    
}
