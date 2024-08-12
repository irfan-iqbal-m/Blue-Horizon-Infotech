<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function Project(Request $request)
    {
        $datas = Project::get();
        return view('project', compact('datas'));
    }
    public function Task(Request $request)
    {
        $datas = Task::with('project')->get();
        return view('task', compact('datas'));
    }
    public function Entry(Request $request)
    {
        $datas = Entry::with('task')->get();
        return view('entry', compact('datas'));
    }
    public function Create(Request $request)
    {
        $tasks = Task::with('project')->where('status_id', 1)->get();
        return view('add-entry', compact('tasks'));
    }
    public function Store(Request $request)
    {
        $obj = new Entry();
        $obj->task_id = $request->task_id;
        $obj->hours = $request->hours ?? 1;
        $obj->date = $request->date ?? \Carbon\Carbon::today();
        $obj->description = $request->description;
        $obj->save();
        return redirect()->route('entry');
    }
}
