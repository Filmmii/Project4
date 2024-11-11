<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportModel;

class DashboardController extends Controller
{
    public function index(){
    $report = ReportModel::get();
    return view('report/index', compact('report'), ['currentPage' => 'report']);
}

    // $report = ReportModel::all();
    // return view("dashboard", compact("report"));
}


// DashboardController.php
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Report;

// class DashboardController extends Controller
// {
//     public function index()
//     {
//         // ดึงข้อมูลจากตาราง report
//         $report = Report::all();

//         // ส่งข้อมูลไปยัง view 'dashboard'
//         return view('dashboard', ['report' => $report]);
//     }
// }
