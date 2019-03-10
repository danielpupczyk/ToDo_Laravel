<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$user = new User();
		$user->first_name = 'Jan';
		$user->last_name = 'Kowalski';
		$user->email = 'jan@kowalski.com';
		$user->password = bcrypt('jkowalski');
		$user->save();
		
		$user = new User();
		$user->last_name = 'Nowak';
		$user->email = 'jan@nowak.com';
		$user->password = bcrypt('jnowak');
		$user->save();
		
		$user = new User();
		$user->first_name = 'Jan';
		$user->email = 'jan@chromy.com';
		$user->password = bcrypt('jchromy');
		$user->save();
    }
}
