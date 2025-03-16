<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Repository\interfaces\FieldsInterfaces;
use App\Repository\interfaces\RepositoryInterface;


class UserRepository implements RepositoryInterface,FieldsInterfaces
{

    public function create($data): int
    {

        $user = User::create([
            'firstname' => $data["firstname"],
            'lastname' => $data["lastname"],
            'email' => $data["email"],
            'password' => $data["password"],
            'phone' => $data["phone"],
            'image' => $data["image"],
            'role' => $data["role_id"]
        ]);

        return $user->id;
    }
    public function show()
    {
        $users = User::where("id", '!=', Auth::id())->get();

        return $users;
    }

    public function delete( $id)
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
        $data = User::where("id", "=", $id)->first();

        return $data;
    }
    public function findByFields($columnName,$value)
    {
        $data = User::where($columnName, "=", $value)->first();

        return $data;
    }
    
}










?>