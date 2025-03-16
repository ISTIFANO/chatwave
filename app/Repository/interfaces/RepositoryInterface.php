<?php 
namespace App\Repository\interfaces;

interface RepositoryInterface{


    public function create($data) :int;
    public function show();

    public function delete($id);

    public function update($data,$id);

    public function findOne($id);

}




?>