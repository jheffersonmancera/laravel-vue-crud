<?php

use Illuminate\Database\Seeder;
use App\Task;//*1

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Task::class, 5)->create();//*2
    }
}
