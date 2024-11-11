@extends('layout') <!-- กำหนดให้ใช้เลย์เอาท์หลักที่กำหนดใน layout.blade.php -->
@section('title', 'Project Index') <!-- กำหนดชื่อหัวข้อหน้าเป็น "Project Index" -->
@section('content')

<div class="container mt-4">
    <!-- ส่วนหัวของหน้า พร้อมกับปุ่มเพิ่มข้อมูลโครงการ -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Project List</h2> <!-- หัวข้อแสดงรายการโครงการ -->
        <a href="{{ route('project.create') }}" class="btn btn-info">เพิ่มข้อมูล</a> <!-- ปุ่มสำหรับเพิ่มข้อมูลโครงการใหม่ -->
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
                        <th scope="col">ชื่อโครงการ</th>
                        <th scope="col">วัตถุประสงค์โครงการ</th>
                        <th scope="col">งบประมาณ</th>
                        <th scope="col">วันที่เริ่มโครงการ</th>
                        <th scope="col">วันสิ้นสุดโครงการ</th>
                        <th scope="col">ดำเนินการ</th> <!-- คอลัมน์สำหรับจัดการข้อมูลโครงการ -->
                    </tr>
                </thead>
                <tbody>
                    <!-- วนลูปแสดงข้อมูลแต่ละรายการ -->
                    @forelse ($project as $pj)
                    <tr>
                        <td class="text-center">{{ $pj->project_id }}</td>
                        <td>{{ $pj->project_name }}</td>
                        <td>{{ $pj->objective }}</td>
                        <td>{{ number_format($pj->budget, 2) }}</td>
                        <td>{{ $pj->start_date }}</td>
                        <td>{{ $pj->end_date }}</td>
                        <td>
                            <!-- ปุ่มดูรายละเอียดของโครงการ -->
                            <a href="{{ route('project.details', $pj->project_id) }}" class="btn btn-info btn-sm">ดูรายละเอียด</a>
                            <!-- ปุ่มแก้ไขโครงการ -->
                            <a href="{{ route('project.edit', $pj->project_id) }}" class="btn btn-warning btn-sm">แก้ไข</a>
                            <!-- ฟอร์มสำหรับลบโครงการ -->
                            <form action="{{ route('project.destroy', $pj->project_id) }}" method="POST" class="d-inline">
                                @csrf <!-- Token เพื่อความปลอดภัยในการลบข้อมูล -->
                                @method("DELETE") <!-- กำหนดให้ใช้เมธอด DELETE -->
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('ต้องการลบข้อมูลใช่หรือไม่?')">ลบ</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <!-- กรณีที่ไม่มีข้อมูลจะแสดงข้อความแจ้งเตือน -->
                    <tr>
                        <td colspan="7" class="text-center text-muted">ไม่มีข้อมูลโครงการ</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection