<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(Request $request)
    {
        $projects = Project::with('tasks')->whereHas('tasks')->where('status_id', 1)->get();


        return view('report', compact('projects'));
    }

    public function search(Request $request)
    {

        $projects = Project::with('tasks')->whereHas('tasks')->where('status_id', 1)->where(function ($datas) use ($request) {
            if (!empty($request->search)) {
                $searchTerm = "%{$request->search}%";
                $datas->orWhere('name', 'like', $searchTerm);
            }
        })->get();
        return view('inner-list', compact('projects'));
    }
   
}
