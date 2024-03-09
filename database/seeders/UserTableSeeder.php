<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'AdminOne',
        //     'email' => 'adminOne@gmail.com',
        //     'phone_number' => '09112233445',
        //     'address' => 'New York City',
        //     'password' => Hash::make('adminOne')
        // ]);

        // $faker = Faker::create();

        // foreach (range(1, 10) as $index) {
        //     User::create([
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'phone_number' => $faker->phoneNumber,
        //         'address' => $faker->address,
        //         'password' => Hash::make('password'), // You can set a default password
        //         'remember_token' => Str::random(10),
        //     ]);`
        // }
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => 'AdminOne',
                'email' => 'adminOne@gmail.com',
                'phone_number' => '09112233445',
                'address' => 'new york city',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'AdminTwo',
                'email' => 'adminTwo@gmail.com',
                'phone_number' => '09112233446',
                'address' => 'canada',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'AdminThree',
                'email' => 'adminThree@gmail.com',
                'phone_number' => '09112233447',
                'address' => 'japan',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
