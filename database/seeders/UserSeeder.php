<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $users = User::factory(1000)->make([
                'updated_at' => now()->toDateTimeString(),
                'created_at' => now()->toDateTimeString()
            ])->toArray();

            User::insert($users);
        }
    }
}
