<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(2)->create();

        $users->each(function (User $user) {
            $date = date('Y-m-d H:i:s');
            $user->roles()->attach(1, ['created_at' => $date, 'updated_at' => $date]);
        });
    }
}
