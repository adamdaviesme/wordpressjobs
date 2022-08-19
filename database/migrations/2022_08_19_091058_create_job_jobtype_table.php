<?php

use App\Models\Job;
use App\Models\JobType;
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
        Schema::create('job_job_type', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Job::class);
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
        Schema::dropIfExists('job_jobtype');
    }
};
