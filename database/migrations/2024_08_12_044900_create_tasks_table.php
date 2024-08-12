<?php

use App\Models\Project;
use App\Models\Task;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('project_id')->constrained('projects')->nullable();
            $table->integer('status_id')->nullable()->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        $task = new Task();
        $task->name = 'Task 1';
        $task->project_id = Project::where('name', 'Project 1')->first()->id;
        $task->save();
        $task = new Task();
        $task->name = 'Task 2';
        $task->project_id = Project::where('name', 'Project 1')->first()->id;
        $task->save();
        $task = new Task();
        $task->name = 'Task 3';
        $task->project_id = Project::where('name', 'Project 1')->first()->id;
        $task->save();
        $task = new Task();
        $task->name = 'Task 4';
        $task->project_id = Project::where('name', 'Project 4')->first()->id;
        $task->save();
        $task = new Task();
        $task->name = 'Task 5';
        $task->project_id = Project::where('name', 'Project 4')->first()->id;
        $task->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
