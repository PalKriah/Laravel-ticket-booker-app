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

        $user = new User();
        $user->firstname = 'Pál';
        $user->lastname = 'Szabó';
        $user->email = 'pal.szabo@cinema-city.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->roles()->attach(['2']);
        $user->cinemas()->attach(['1']);

        $user = new User();
        $user->firstname = 'András';
        $user->lastname = 'Kovács';
        $user->email = 'andras.kovacs@cinema-city.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->roles()->attach(['2']);
        $user->cinemas()->attach(['2']);

        $user = new User();
        $user->firstname = 'Thomas';
        $user->lastname = 'Smith';
        $user->email = 'thomas.smith@odeon.com';
        $user->password = Hash::make('12345678');
        $user->save();
        $user->roles()->attach(['2']);
        $user->cinemas()->attach(['4']);
    }
}
