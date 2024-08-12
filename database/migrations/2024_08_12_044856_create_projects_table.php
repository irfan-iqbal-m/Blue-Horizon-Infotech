<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('status_id')->nullable()->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
        $projects = [
            ['name' => 'Project 1'],
            ['name' => 'Project 2', 'status_id' => 2],
            ['name' => 'Project 3'],
            ['name' => 'Project 4'],
            ['name' => 'Project 5'],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
