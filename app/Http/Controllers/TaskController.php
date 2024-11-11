<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskModel;
use App\Models\ProjectModel; // Ensure ProjectModel is imported

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // $tasks = TaskModel::all();
        // return view('task.index', data: compact('tasks'))->with('currentPage', 'task');
        $project = ProjectModel::with('tasks')->findOrFail($id);
        $tasks = TaskModel::where('project_id', $id)->get();
        return view('task.index', compact('tasks', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($project_id)
    {
        $project = ProjectModel::findOrFail($project_id);
        return view('task.create', compact('project'))->with('currentPage', 'task');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $project_id)
    {
        $validatedData = $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        // รวมข้อมูลที่ต้องการจะบันทึกเข้าในอาร์เรย์เดียว
        $validatedData['project_id'] = $project_id;

        // dd($validatedData);
    
        // สร้างบันทึกใหม่ในฐานข้อมูล
        $result = TaskModel::create(attributes: $validatedData);
    
        // dd($result); // ตรวจสอบผลลัพธ์
    
        // สามารถส่งกลับไปยังหน้าอื่นหรือแสดงข้อความสำเร็จได้
        return redirect()->route('project.details', $project_id)->with('success', 'งานถูกเพิ่มเรียบร้อยแล้ว');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $project = ProjectModel::with('tasks')->findOrFail($id);
    return view('project.details', compact('project'));
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($task_id)
    {
        $task = TaskModel::findOrFail($task_id);
        return view('task.edit', compact('task'))->with('currentPage', 'task');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $task_id)
    {
        $task = TaskModel::findOrFail($task_id);

        $validatedData = $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'assigned_to' => 'nullable|integer',
            'project_id' => 'nullable|integer',
        ]);

        $task->update($validatedData);

        return redirect()->route('task.index')->with('success', 'งานถูกแก้ไขเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($task_id)
    {
        $task = TaskModel::findOrFail($task_id);
        $project_id = $task->project_id;    

        // dd($task->project_project_id, $project_id);
        $task->delete();
        
        // dd("deltee");
        // Redirect ไปยังเส้นทาง /project/{project_id}/details พร้อมแสดงข้อความสำเร็จ
        return redirect()->route('project.details', ['project' => $project_id])->with('success', 'งานถูกลบเรียบร้อยแล้ว');
    }
}