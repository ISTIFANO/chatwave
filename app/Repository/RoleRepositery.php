<?php 
namespace App\Repository;

use App\Models\Role;
use App\Repository\interfaces\FieldsInterfaces;

class RoleRepositery implements FieldsInterfaces{

    public function findByFields($columnName,$value)
    {
        $data = Role::where($columnName, "=", $value)->first();

        return $data->id;
    }
    public function update($data, $id)
    {
        $data = $this->findOne($id)->update($data);
        return $data;
    }
    public function create($data): int
    {

        $role = Role::create([
            'name' => $data["name"]
            
        ]);

        return $role->id;
    }
    public function findOne($id)
    {
        $data = Role::where("id", "=", $id)->first();

        return $data;
    }
}










?>