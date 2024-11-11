@extends('layout')
@section('title','task')
@section('content')
<div>
    <a href="{{ route('task.create',['project' => $project->id]) }}">
    <button type="button" class="btn btn-info">เพิ่มข้อมูล</button></a>
</div>
<html>

<head>
    <title>Show Task</title>
</head>

<body>
    <table class="table table">
        <thead class="thead-dark">
            <tr>
                <td>รหัสงาน</td>
                <td>ผู้ที่ได้รับมอบหมายงาน</td>
                <td>ชื่องาน</td>
                <td>รายละเอียด</td>
                <td>สถานะ</td>
                <td>วันที่เริ่มโครงการ</td>
                <td>วันสิ้นสุดโครงการ</td>
                <td>รหัสโครงการ</td>
                <td>ดำเนินการ</td>

            </tr>
            @foreach ($task as $t)
            <tr>
                <td>{{ $t->task_id }}</td>
                <td>{{ $t->assigned_to }}</td>
                <td>{{ $t->task_name }}</td>
                <td>{{ $t->description }}</td>
                <td>{{ $t->status }}</td>
                <td>{{ $t->start_date }}</td>
                <td>{{ $t->end_date }}</td>
                <td>{{ $t->project_id }}</td>
                <td>
                    <!-- <a href="{{ route('project.edit', $pj->project_id) }}" class="btn btn-warning btn-sm">แก้ไข</a> -->
                    <button class="btn btn-warning"><a href="{{ route('task.edit',$t->task_id)}}">แก้ไข</a></button>
                    <form action="{{ route('task.destroy',$t->task_id) }}" method="POST">
                    </form>
                @csrf
                @method("DELETE")
                    <form type=submit class="btn btn-danger"
                        onclick="return confirm('ต้องการลบข้อมูลใช่หรือไม่?')">ลบ
                    </form>
                </td>
            </tr>
            @endforeach
            @endsection
    </table>
</body>

</html>

<!-- @extends('layout')
@section('title', 'Task')
@section('content')
<div>
    <a href="{{ route('task.create', ['project' => $project->id]) }}">
        <button type="button" class="btn btn-info">เพิ่มข้อมูล</button>
    </a>
</div>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>รหัสงาน</th>
            <th>ผู้ที่ได้รับมอบหมายงาน</th>
            <th>ชื่องาน</th>
            <th>รายละเอียด</th>
            <th>สถานะ</th>
            <th>วันที่เริ่มโครงการ</th>
            <th>วันสิ้นสุดโครงการ</th>
            <th>รหัสโครงการ</th>
            <th>ดำเนินการ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($task as $t)
            <tr>
                <td>{{ $t->task_id }}</td>
                <td>{{ $t->assigned_to }}</td>
                <td>{{ $t->task_name }}</td>
                <td>{{ $t->description }}</td>
                <td>{{ $t->status }}</td>
                <td>{{ $t->start_date }}</td>
                <td>{{ $t->end_date }}</td>
                <td>{{ $t->project_project_id }}</td>
                <td>
                    <a href="{{ route('task.edit', $t->task_id) }}" class="btn btn-warning">แก้ไข</a>
                    
                    <form action="{{ route('task.destroy', $t->task_id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลใช่หรือไม่?')">ลบ</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection -->
