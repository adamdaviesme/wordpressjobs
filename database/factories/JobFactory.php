<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $salaryFrom = intval(round(rand(10000, 75000), -3));
        $salaryTo = intval(round(rand($salaryFrom, $salaryFrom * 1.5), -3));

        return [
            'name' => fake()->jobTitle(),
            'expiry_date' => fake()->dateTimeBetween('now', '+14 days'),
            'job_description' => fake()->paragraphs(3, true),
            'salary_from' => $salaryFrom,
            'salary_to' => $salaryTo,
            'is_remote' => fake()->boolean(40),
            'is_featured' => fake()->boolean(20),
            'is_paid' => 1,
            'location_id' => Location::pluck('id')->random(),
            'company_id' => Company::pluck('id')->random()
        ];
    }
}
