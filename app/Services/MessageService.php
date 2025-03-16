<?php

namespace App\Services;

use App\Services\Service;
use App\Services\interfaces\ServicesInterface;
use MessageRepository\MessageRepository;

class MessageService extends Service implements ServicesInterface
{

    protected MessageRepository $message_repositery;


    public function __construct()
    {
        $this->message_repositery = new MessageRepository;
    }
    public function create($data)
    {

        if (!empty($data['message']) && $this->validate("message", $data['message'])) {
            return $this->message_repositery->create($data);
        }
    }

    public function update($data, $id) {}
}
