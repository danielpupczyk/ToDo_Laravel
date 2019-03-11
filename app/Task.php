<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable =[
		'title','description','deadline','users_id'				//które pola mają zostać użyte do stworzenia page
	];
}
