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
        
        DB::table('users')->delete();

        $user = new User;
        $user->name = 'Duvan';
        $user->email = 'duvanquevedo963@gmail.com';
        $user->password = bcrypt('olakease');
        $user->save();

    }
}
