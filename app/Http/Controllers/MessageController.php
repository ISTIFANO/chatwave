<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Events\UserTyping;
use App\Models\User;
use App\Models\Message;

use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Cache;

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
        
        return response()->json(['message' => 'Message sent succ']);

    }
    public function typing(){

        broadcast(new UserTyping(Auth::id()))->toOthers();

 return response()->json(['message' => 'is typing']);

    }
    public function SetOnline(){

Cache::put('user-id-online-', Auth::id(),true,now()->addMinute(5));

return response()->json(['message' => 'is online']);

    }

    public function SetOffline(){

        Cache::put('user-id-offline-', Auth::id());
        
        return response()->json(['message' => 'is offline']);
        
            }

}
