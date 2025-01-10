<?php

namespace Database\Seeders;

use App\Models\Provider;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@polindra.ac.id',
            'password' =>  Hash::make('password'),
        ]);

        User::factory()->count(5000)->create();

        $providers = ['XL', 'Telkomsel', 'Three', 'IM3'];
        foreach($providers as $provider)
            Provider::create([
                'name' => $provider,
            ]);
    }
}
