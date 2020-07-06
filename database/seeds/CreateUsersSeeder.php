<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create ([            
            'name'=>'Admin',
            'email'=>'anonymous0101@gmail.com',
            'is_admin'=>'1',
            'password'=> bcrypt('MrRobot')
        ]);
  
        /*foreach ($user as $key => $value) {
            User::create($value);
        }*/
    }
}
