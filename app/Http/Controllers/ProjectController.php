<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportModel; // เพิ่มการ import ของ ReportModel
use App\Models\ProjectModel; // หากต้องการใช้ ProjectModel ด้วย
use App\Models\TaskModel;    // หากต้องการใช้ TaskModel ด้วย

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = ProjectModel::get();
        return view('project/index', compact('project'), ['currentPage' => 'project']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project_id = ProjectModel::max('project_id');
        return view('project/create', compact('project_id'), ['currentPage' => 'project']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = new ProjectModel;

        $request->validate(
            [
                'project_id'=>'required|max:5',
                'project_name'=>'required',
                'objective'=>'required',
                'budget'=>'required',
                'start_date'=>'required',
                'end_date'=>'required',

            ]
        );

        $project->project_id = $request->project_id;
        $project->project_name = $request->project_name;
        $project->objective = $request->objective;
        $project->budget = $request->budget;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;

        $project->save();

        return redirect("project");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $project = ProjectModel::with('tasks')->findOrFail($id);
    $currentPage = 'project';
    return view('project.details', compact('project', 'currentPage'));
}
   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $project_id)
    {
        $project = ProjectModel::find($project_id);
        return view('project/edit', compact('project'), ['currentPage' => 'project']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = ProjectModel::find($id);

        $project->project_name = $request->project_name;
        $project->objective = $request->objective;
        $project->budget = $request->budget;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;

        $project->save();

        return redirect('project');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     ProjectModel::find($id)->delete();
    //     return redirect('project');
    // }
    public function destroy(string $project_id)
{
    ProjectModel::find($project_id)->delete();
    return redirect('project');
}

}