<?php

use Illuminate\Database\Seeder;
use \App\Poll;

class PollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Poll::create([
            'name' => 'Test',
            'choices' => 5,
            'description' => 'This is a test',
            'code' => uniqid()
        ]);


    }
}
