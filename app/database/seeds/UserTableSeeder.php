<?php

// Change here.

use App\Models\User;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'firstname' => 'Efstathios',
            'lastname' => 'Chatzikyriakidis',
            'username' => 'echatzikyriakidis',
            'password' => 'nopasswords'
        ]);

        User::create([
            'firstname' => 'Vagelis',
            'lastname' => 'Mitropoulos',
            'username' => 'vmitropoulos',
            'password' => 'nopasswords'
        ]);
    }
}

?>