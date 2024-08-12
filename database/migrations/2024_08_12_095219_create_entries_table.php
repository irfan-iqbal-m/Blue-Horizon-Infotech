<?php

use App\Models\Entry;
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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('tasks')->nullable();
            $table->integer('hours')->nullable()->default(1);
            $table->date('date')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        $entry = new Entry();
        $entry->task_id = Task::where('name', 'Task 1')->first()->id;
        $entry->hours = 6;
        $entry->date = \Carbon\Carbon::createFromFormat('d-m-Y', '25-02-2021')->format('Y-m-d');;
        $entry->description = 'DB creation';
        $entry->save();
        $entry = new Entry();
        $entry->task_id = Task::where('name', 'Task 2')->first()->id;
        $entry->hours = 3;
        $entry->date = \Carbon\Carbon::createFromFormat('d-m-Y', '28-03-2021')->format('Y-m-d');
        $entry->description = 'Bug fixing';
        $entry->save();
        $entry = new Entry();
        $entry->task_id = Task::where('name', 'Task 4')->first()->id;
        $entry->hours = 6;
        $entry->date = \Carbon\Carbon::createFromFormat('d-m-Y', '03-03-2021')->format('Y-m-d');
        $entry->description = 'Testing';
        $entry->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
