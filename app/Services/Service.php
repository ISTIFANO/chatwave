<?php 
namespace App\Services;

use Exception;


abstract class Service{


    public function validate($type, $value) {
        switch ($type) {
            case 'email':
                if (preg_match("/^[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+\.[a-zA-Z]+$/", $value)) {
                    return true;
                } else {
                    throw new Exception("Invalid email ");
                }
                break;
    
            case 'numero':
                if (preg_match("/^[0-9]+$/", $value)) {
                    return true; 
                } else {
                    throw new Exception("invalid number format");
                }
                break;
                case 'message':
                    if (preg_match("/^[a-zA-Z0-9]+$/", $value)) {
                        return true; 
                    } else {
                        throw new Exception("message invalide");
                    }
                    break;
    
            case 'text':
                if (preg_match("/^[a-zA-Z]+$/", $value)) {
                    return true;
                } else {
                    throw new Exception("invalid text");
                }
                break;
    
            default:
                throw new Exception("type not correct : " . $type);
                break;
        }
    }
    


}






























?>