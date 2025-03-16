<?php

namespace App\Services;

use App\Services\Service;
use App\Repository\RoleRepositery;
use App\Services\interfaces\ServicesInterface;

class RoleService extends Service implements ServicesInterface  
{

    protected RoleRepositery $role_repositery;


    public function __construct()
    {
        $this->role_repositery = new RoleRepositery;
    }
    public function create($data)
    {
        
    }
    public function update($data, $id)
    {
        
    }
    public function findbyName($data){
     
        if(!empty($data) && $this->validate("text",$data)){

      return  $this->role_repositery->findByFields("name",$data);
        }
    }

}
