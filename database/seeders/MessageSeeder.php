<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            [
                'message' => 'Hello Aamir',
                'sender_id' => 1,  
                'receiver_id' => 2,  
            ],
            [
                'message' => 'c est aamir el amiri',
                'sender_id' => 2,
                'receiver_id' => 1, 
            ],
            [
                'message' => 'c est aamir ',
                'sender_id' => 1,
                'receiver_id' => 3, 
            ],
            [
                'message' => 'Slm cv ',
                'sender_id' => 3,
                'receiver_id' => 1,
            ],
       
        ];

        DB::table('messages')->insert($messages);
    }
}
