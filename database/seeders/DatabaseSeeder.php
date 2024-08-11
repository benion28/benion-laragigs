<?php

namespace Database\Seeders;

use App\Models\Listing;
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

        $user = User::factory()->create([
            'name' => 'Bernard Iorver',
            'email' => 'benion@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);

        User::factory(29)->create();

        Listing::create([
            'title' => 'Laravel Senior Developer',
            'tags' => 'laravel, javascript',
            'company' => 'Acme Corp',
            'location' => 'Boston, MA',
            'email' => 'email1@email.com',
            'user_id' => $user->id,
            'website' => 'https://www.acme.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);

        Listing::create([
            'title' => 'Full-Stack Engineer',
            'tags' => 'laravel, backend ,api',
            'company' => 'Stark Industries',
            'location' => 'New York, NY',
            'email' => 'email2@email.com',
            'user_id' => $user->id,
            'website' => 'https://www.starkindustries.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);

        Listing::create([
            'title' => 'Backend Developer',
            'tags' => 'laravel, php, api',
            'company' => 'Skynet Systems',
            'location' => 'Newark, NJ',
            'email' => 'email4@email.com',
            'user_id' => $user->id,
            'website' => 'https://www.skynet.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);

        Listing::create([
            'title' => 'Junior Developer',
            'tags' => 'laravel, php, javascript',
            'company' => 'Wonka Industries',
            'location' => 'Boston, MA',
            'email' => 'email4@email.com',
            'user_id' => $user->id,
            'website' => 'https://www.wonka.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);

        Listing::factory(46)->create();
    }
}
