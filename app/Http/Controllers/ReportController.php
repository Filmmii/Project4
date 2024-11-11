<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportModel;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = ReportModel::all();
        $currentPage = 'dashboard'; // กำหนดให้สอดคล้องกับ Dashboard
        return view('dashboard', compact('reports', 'currentPage'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       /* /  $report = ReportModel::with('project')->findOrFail($id); 
       $report = DB::table('report as rp')
                ->leftjoin('member as m', 'rp.member_id', '=', 'm.id')
                ->leftjoin('project as pj', 'rp.project_id', '=', 'pj.id')
                ->leftjoin('team as team', 'rp.team_id', '=', 'team.id')
                ->leftjoin('task as t', 'rp.task_id', '=', 'tk.id')
                ->select('rp.report_id', 'pj.name as project_name', 
                'm.firt_name as mem_first_name',
                'm.last_name as mem_last_name',
                'team.name as team_name', 
                't.name as task_name',
                'pj.start_date', 
                'pj.end_date', )

                ->get();

        return view('project.details/show', compact('report'), ['currentPage' => 'report']); */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $report = DB::table('report as rp')
        //         ->leftjoin('member as m', 'rp.member_id', '=', 'm.id')
        //         ->leftjoin('project as pj', 'rp.project_id', '=', 'pj.id')
        //         ->leftjoin('team as team', 'rp.team_id', '=', 'team.id')
        //         ->leftjoin('task as t', 'rp.task_id', '=', 'tk.id')
        //         ->select('rp.report_id', 'pj.name as project_name', 
        //         'm.firt_name as mem_first_name',
        //         'm.last_name as mem_last_name',
        //         'team.name as team_name', 
        //         't.name as task_name',
        //         'pj.start_date', 
        //         'pj.end_date', )

        //         ->get();

        // return view('report.details/show', compact('report'), ['currentPage' => 'report']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $report = ReportModel::with('project.tasks')->findOrFail($id);
        $currentPage = 'project';
        return view('report.report_details', compact('report', 'currentPage'));


    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}