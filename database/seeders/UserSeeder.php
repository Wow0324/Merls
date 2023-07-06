<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default password
        $defaultPassword = app()->environment('production') ? Str::random() : '12345678';
        $this->command->getOutput()->writeln("<info>Default password:</info> $defaultPassword");

        // Create super admin user
        $user     = new User();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $user->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        /*
         * Create roles
         */

        $superAdmin            = $user->create([
            'first_name'        => 'alex',
            'last_name'        => 'tarasov',
            'email'             => 'alextarasov7555@gmail.com',
            'password'          => bcrypt($defaultPassword),
            'role'            => 0,
            'email_verified_at' => now(),
        ]);
        $superAdmin->save();
    }
}
