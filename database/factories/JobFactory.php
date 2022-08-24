<?php

namespace Database\Factories;

use App\Models\Benefit;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Location;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{

    private function getJobContent()
    {
        $jobContent = '';
        $paragraphs = $this->faker->paragraphs(rand(4, 6));
        foreach ($paragraphs as $paragraph) {
            $jobContent .= '<h3>'
                . $this->faker->realText(rand(15, 30)) . '</h3>';
            $jobContent .= '<p>' . $paragraph . '</p>';
        }

        return $jobContent;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //Salary
        $salaryFrom = intval(round(rand(10000, 75000), -3));
        $salaryTo = intval(round(rand($salaryFrom, $salaryFrom * 1.5), -3));

        //Created dates
        $postedDate = Carbon::today()->subDays(rand(0, 14));
        $expiryDate = Carbon::create($postedDate)->addDays(rand(2, 14));

        //Job title and slug
        $name = fake()->jobTitle();
        $slug = Str::slug($name, '_');

        return [
            'created_at' => $postedDate,
            'name' => $name,
            'slug' => $slug,
            'expiry_date' => $expiryDate,
            'job_description' => $this->getJobContent(),
            'salary_from' => $salaryFrom,
            'salary_to' => $salaryTo,
            'is_remote' => fake()->boolean(40),
            'is_featured' => fake()->boolean(5),
            'is_paid' => 1,
            'application_url' => fake()->url(),
            'location_id' => Location::pluck('id')->random(),
            'company_id' => Company::pluck('id')->random(),
            'job_type_id' => JobType::pluck('id')->random()
        ];
    }

    public function configure()
    {


        return $this->afterCreating(function (Job $job) {
            $tagsCount = Tag::count();
            $benefitCount = Benefit::count();

            $job->tags()->attach(
                Tag::all()->random(rand(1, $tagsCount))->pluck('id')->toArray()
            );

            $job->benefits()->attach(
                Benefit::all()->random(rand(1, $benefitCount))->pluck('id')->toArray()
            );
        });
    }
}
