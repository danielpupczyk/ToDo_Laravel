<?php

use Illuminate\Database\Seeder;

use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Task();
		$task->title = 'Pranie';
		$task->description = 'Zrobić pranie';
		$task->deadline = '2019-04-09 16:32:00';
		$task->status = 'active';
		$task->users_id='1';
		$task->save();
		
		$task = new Task();
		$task->title = 'Sprzątanie';
		$task->description = 'Posprzątać';
		$task->deadline = '2019-04-10 16:32:00';
		$task->status = 'active';
		$task->users_id='1';
		$task->save();
		
		$task = new Task();
		$task->title = 'Zakupy';
		$task->description = 'Zrobić zakupy';
		$task->deadline = '2019-04-08 19:32:00';
		$task->done_at = '2019-03-08 19:32:00';
		$task->status = 'done';
		$task->users_id='1';
		$task->save();
		
		$task = new Task();
		$task->title = 'COs';
		$task->description = 'cosik';
		$task->deadline = '2019-04-10 16:32:00';
		$task->status = 'active';
		$task->users_id='2';
		$task->save();
    }
}
