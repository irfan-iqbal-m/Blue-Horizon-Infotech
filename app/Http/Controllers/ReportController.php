<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(Request $request)
    {
        $projects = Project::with('tasks.entries')->whereHas('tasks.entries')->where('status_id', 1)->get();
        $datas = $this->getReport($projects);
        return view('report', compact('datas'));
    }

    public function search(Request $request)
    {

        $projects = Project::with('tasks.entries')->whereHas('tasks.entries')->where('status_id', 1)->where(function ($datas) use ($request) {
            if (!empty($request->search)) {
                $searchTerm = "%{$request->search}%";
                $datas->orWhere('name', 'like', $searchTerm);
            }
        })->get();
        $datas = $this->getReport($projects);
        return view('inner-list', compact('datas'));
    }
    public function getReport($projects)
    {
        $projects = $projects;

        $report = [];
        $i = 1; // Project numbering starts at 1

        foreach ($projects as $project) {
            $totalProjectHours = 0;
            $report[] = [
                'Sno' => $i++,
                'Name' => $project->name,
                'Total hours' => $totalProjectHours
            ];

            foreach ($project->tasks as $task) {
                $taskHours = $task->entries->sum('hours');
                if ($taskHours > 0) {
                    $report[] = [
                        'Sno' => '',
                        'Name' => $task->name,
                        'Total hours' => $taskHours
                    ];
                    $totalProjectHours += $taskHours;
                }
            }

            // Update the project total hours
            $report[count($report) - count($project->tasks)]['Total hours'] = $totalProjectHours;
        }
        return $report;
    }
}
