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
      User::create([
          'role_id'=>1,
          'active' => 1,
          'name' => 'Calvine',
          'username' => 'Calvine',
          'email' => 'calvineotieno010@gmail.com',
          'password' => bcrypt('12345678'),
          'remember_token' => str_random(10),


      ]);
    }
}
