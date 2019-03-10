<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('title');
			$table->string('description');
			$table->dateTime('deadline');
			$table->dateTime('done_at')->nullable();
			$table->enum('status', ['active', 'done']);
			$table->bigInteger('users_id')->unsigned();
            $table->timestamps();
        });
		
		Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('users_id')
				->references('id')
				->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
