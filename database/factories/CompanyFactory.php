<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $companyTypes = ['agency', 'real estate', 'construction', 'digital products', 'government', 'leisure'];

        return [
            'name' => fake()->company(),
            'website_url' => fake()->url(),
            'company_type' => $companyTypes[array_rand($companyTypes)],
            'company_email' => fake()->email(),
            'location_id' => Location::pluck('id')->random(),
        ];
    }
}
