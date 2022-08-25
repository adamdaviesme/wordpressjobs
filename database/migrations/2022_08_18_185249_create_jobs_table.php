<?php

use App\Models\Company;
use App\Models\JobType;
use App\Models\Location;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wp_jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('slug');
            $table->dateTime('expiry_date');
            $table->text('job_description')->nullable();
            $table->integer('salary_from')->nullable();
            $table->integer('salary_to')->nullable();
            $table->integer('feature_duration')->default(0);
            $table->boolean('is_remote')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_paid')->default(false);
            $table->string('application_url')->default('');
            $table->foreignIdFor(Location::class);
            $table->foreignIdFor(Company::class);
            $table->foreignIdFor(JobType::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
