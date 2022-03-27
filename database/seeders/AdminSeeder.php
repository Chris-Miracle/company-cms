<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Wallet;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Chris Miracle',
            'email' => 'admin@admin.com',
            'usertype' => User::ADMIN,
            'password' => bcrypt('password'),
        ]);

        Wallet::create([
            'user_id' => $admin->id,
            'balance' => 25000000
        ]);
    }
}
