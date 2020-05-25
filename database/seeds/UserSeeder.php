<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->firstname = 'Krisztián';
        $user->lastname = 'Palanek';
        $user->email = 'pal.kriah@gmail.com';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach(['1']);
    }
}
