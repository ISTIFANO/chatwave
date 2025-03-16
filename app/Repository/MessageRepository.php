<?php

namespace MessageRepository;

use App\Models\Message;
use App\Repository\interfaces\FieldsInterfaces;
use Illuminate\Support\Facades\Auth;
use App\Repository\interfaces\RepositoryInterface;

class MessageRepository implements RepositoryInterface, FieldsInterfaces
{

    public function create($data): int
    {
        $message = Message::create([
            'sender_id'     => Auth::id(),
            'receiver_id'   => $data['receiverId'],
            'message'       => $data['message']
        ]);

        return $message->id;
    }
    public function show()
    {
        $message = Message::query()
            ->orderByRaw('updated_at - created_at DESC')
            ->get();
        return $message;
    }

    public function delete($id)
    {
        $this->findOne($id)->delete();

        return true;
    }
    public function update($data, $id)
    {
        $data = $this->findOne($id)->update($data);
        return $data;
    }

    public function findOne($id)
    {
        $data = Message::where("id", "=", $id)->first();

        return $data;
    }
    public function findByFields($columnName, $value)
    {
        $data = Message::where($columnName, "=", $value)->first();

        return $data;
    }
    public function  ChatWith($receiver_id)
    {
        $conversation = Message::where(function ($query) use ($receiver_id) {
            $query->where("sender_id", '=', Auth::id())->where("receiver_id", '=', $receiver_id);
        })->orWhere(function ($query) use ($receiver_id) {

            $query->where("sender_id", '=', $receiver_id)->where("receiver_id", '=', Auth::id());
        });
        return $conversation;
    }
}
