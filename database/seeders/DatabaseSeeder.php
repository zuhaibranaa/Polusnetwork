<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@plc.com',
            'is_admin' => true,
            'password' => Hash::make('Me9@good'),
            'email_verified_at' => Carbon::now(),
            'refference_code' => Str::uuid()->toString(),
        ]);

        Setting::insert([
                [
                    'name' => 'brain_value',
                    'value' => '0.5',
                ],
                [
                    'name' => 'pls_value',
                    'value' => '0.5',
                ]
            ]
        );
    }
}
