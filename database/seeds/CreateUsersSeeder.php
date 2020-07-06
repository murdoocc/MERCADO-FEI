<?php

use Illuminate\Database\Seeder;
use App\User;
use Image;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = Image::make($image_file);
        User::create ([            
            'name'=>'Admin',
            'email'=>'anonymous0101@gmail.com',
            'is_admin'=>'1',
            'password'=> bcrypt('MrRobot'),
            'user_image' => $image
        ]);
  
        /*foreach ($user as $key => $value) {
            User::create($value);
        }*/
    }
}
