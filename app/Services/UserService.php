<?php

namespace App\Services;

use App\Repository\UserRepository;
use App\Services\interfaces\ServicesInterface;
use App\Services\Service;

class UserService extends Service implements ServicesInterface
{
    protected UserRepository $user_repository;
    protected RoleService $role_service;




    public function __construct()
    {
        $this->user_repository = new UserRepository;
    }
    public function create($data)
    {
        if (!empty($data)) {
            if ($this->validate("email", $data['email']) && $this->validate("numero", $data['phone'] && $this->validate("email", $data["firstname"]) && $this->validate("email", $data["lastname"]))) {
                if (isset($data["role"])) {

                   $role = $this->role_service->findbyName($data["role"]);
                   $data["role_id"]=$role;

                }
                $this->user_repository->create($data);
            }
        }
    }
    public function update($data, $id) {}
}
