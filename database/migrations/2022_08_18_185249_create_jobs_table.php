<?php

use App\Models\Company;
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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->dateTime('expiry_date');
            $table->text('job_description');
            $table->integer('salary_from')->nullable();
            $table->integer('salary_to')->nullable();
            $table->boolean('is_remote');
            $table->boolean('is_featured');
            $table->boolean('is_paid');
            $table->foreignIdFor(Location::class);
            $table->foreignIdFor(Company::class);
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
