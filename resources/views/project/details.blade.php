@extends('layout')
@section('title', 'รายละเอียดโครงการ')
@section('content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">รายละเอียดโครงการ - {{ $project->project_name }}</h5>
        </div>
        <div class="card-body">
            <h6>ข้อมูลโครงการ</h6>
            <p><strong>รหัสโครงการ:</strong> {{ $project->project_id }}</p>
            <p><strong>ชื่อโครงการ:</strong> {{ $project->project_name }}</p>
            <p><strong>วัตถุประสงค์โครงการ:</strong> {{ $project->objective }}</p>
            <p><strong>งบประมาณ:</strong> {{ number_format($project->budget, 2) }}</p>
            <p><strong>วันที่เริ่มโครงการ:</strong> {{ $project->start_date }}</p>
            <p><strong>วันสิ้นสุดโครงการ:</strong> {{ $project->end_date }}</p>

            <!-- Button to go back -->
            <button type="reset" onclick="window.history.back()" class="btn btn-danger">ย้อนกลับ</button> 
            
            <!-- Button to add new task -->
            <a href="{{ route('task.create', $project->project_id) }}" class="btn btn-success mb-3">เพิ่มงานใหม่</a>

            <h6 class="mt-4">รายการงานที่เกี่ยวข้อง</h6>
            @if($project->tasks->isEmpty())
                <p class="text-muted">ไม่มีงานที่เกี่ยวข้องในโครงการนี้</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">รหัสงาน</th>
                            <th scope="col">ชื่องาน</th>
                            <th scope="col">คำอธิบายงาน</th>
                            <th scope="col">วันที่เริ่มงาน</th>
                            <th scope="col">วันสิ้นสุดงาน</th>
                            <th scope="col">ดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project->tasks as $task)
                            <tr>
                                <td>{{ $task->task_id }}</td>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->start_date }}</td>
                                <td>{{ $task->end_date }}</td>
                                <td>
                                    <!-- Button to edit task -->
                                    <a href="{{ route('task.edit', $task->task_id) }}" class="btn btn-warning">แก้ไข</a>
                                    <form action="{{ route('task.destroy', $task->task_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลใช่หรือไม่?')">ลบ</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

@endsection
