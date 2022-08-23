<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Location;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Locations
        \App\Models\Location::factory(80)->create();

        // Companies
        \App\Models\Company::factory(80)->create();

        // Job Types
        \App\Models\JobType::insert([
            [
                'name' => 'Full-time',
                'slug' => 'full-time'
            ],
            [
                'name' => 'Part-time',
                'slug' => 'part-time'
            ],
            [
                'name' => 'Contract',
                'slug' => 'contract'
            ],
            [
                'name' => 'Temporary',
                'slug' => 'temporary'
            ],
            [
                'name' => 'Internship',
                'slug' => 'internship'
            ]
        ]);

        // Benefits
        \App\Models\Benefit::insert([
            [
                'name' => 'Home office budget',
                'slug' => 'home-office-budget'
            ],
            [
                'name' => 'Gym membership',
                'slug' => 'gym-membership'
            ],
            [
                'name' => '4 day workweek',
                'slug' => '4-day-workweek'
            ],
            [
                'name' => 'Learning budget',
                'slug' => 'learning-budget'
            ],
            [
                'name' => 'Eyecare',
                'slug' => 'eyecare'
            ],
            [
                'name' => 'Health insurance',
                'slug' => 'health-insurance'
            ],
        ]);

        // Tags
        \App\Models\Tag::insert([
            [
                'name' => 'Full stack',
                'slug' => 'full-stack'
            ],
            [
                'name' => 'WP plugins',
                'slug' => 'wp-plugins'
            ],
            [
                'name' => 'WP themes',
                'slug' => 'wp-themes'
            ],
            [
                'name' => 'WooCommerce',
                'slug' => 'woocommerce'
            ],
            [
                'name' => 'Contact Form 7',
                'slug' => 'contact-form-7'
            ],
            [
                'name' => 'E-commerce',
                'slug' => 'e-commerce'
            ],
            [
                'name' => 'Social',
                'slug' => 'social'
            ],
        ]);

        // Jobs
        \App\Models\Job::factory(128)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
