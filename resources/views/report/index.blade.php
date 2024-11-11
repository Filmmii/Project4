<!-- <html>
    <head>
        <title>Show Report</title>
    </head>
    <body>
        <table border=1>
            <tr>
                <td>รหัสรายงาน</td>
                <td>เนื้อหา</td>
                <td>วันที่สร้าง</td>
                <td>รหัสโครงการ</td> 
            </tr>
            @foreach ($report as $rp)
            <tr>
                <td>{{ $rp->report_id }}</td>
                <td>{{ $rp->content }}</td>
                <td>{{ $rp->create_at }}</td>
                <td>{{ $rp->project_project_id }}</td>
            </tr>
        @endforeach
        </table>
    </body>
</html> -->

@extends('layout')
<!-- กำหนดให้ใช้เลย์เอาท์หลักที่กำหนดใน layout.blade.php -->
@section('title', 'Report Index')
<!-- กำหนดชื่อหัวข้อหน้าเป็น "Project Index" -->
@section('content')

<div class="container mt-4">
    <!-- ส่วนหัวของหน้า พร้อมกับปุ่มเพิ่มข้อมูลโครงการ -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Project List</h2> <!-- หัวข้อแสดงรายการโครงการ -->
        <a href="{{ route('project.create') }}" class="btn btn-info">เพิ่มข้อมูล</a>
        <!-- ปุ่มสำหรับเพิ่มข้อมูลโครงการใหม่ -->
    </div>

    <!-- แสดงข้อความสำเร็จหลังจากดำเนินการ -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <!-- ส่วนตารางแสดงข้อมูลโครงการ -->
    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table align-items-center table-striped mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">รหัสโครงการ</th>
                        <th scope="col">เนื้อหา</th>
                        <th scope="col">วันที่สร้าง</th>
                        <th scope="col">รหัสโครงการ</th>
                        <th scope="col">ดำเนินการ</th> <!-- คอลัมน์สำหรับจัดการข้อมูลโครงการ -->
                    </tr>
                </thead>
                <tbody>
                    <!-- วนลูปแสดงข้อมูลแต่ละรายการ -->
                    @foreach ($report as $rp)
                    <tr>
                        <td>{{ $rp->report_id }}</td>
                        <td>{{ $rp->content }}</td>
                        <td>{{ $rp->create_at }}</td>
                        <td>{{ $rp->project_id }}</td>
                        <td>
                            <!-- ปุ่มดูรายละเอียดของโครงการ -->
                            <a href="{{ route('report.report_details', $rp->report_id) }}"
                                class="btn btn-info btn-sm">ดูรายละเอียด</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection