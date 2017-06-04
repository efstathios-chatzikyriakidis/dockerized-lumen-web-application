<?php

// Change here.

use App\DataAccess\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'Efstathios',

            'last_name' => 'Chatzikyriakidis',

            'email' => 'contact@efxa.org',

            'password' => Hash::make('nopasswords')
        ]);

        User::create([
            'first_name' => 'Vagelis',

            'last_name' => 'Mitropoulos',

            'email' => 'vagelis@mitropoulos.com',

            'password' => Hash::make('nopasswords')
        ]);
    }
}

?>
