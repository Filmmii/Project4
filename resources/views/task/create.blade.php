@extends('layout')
@section('title', 'เพิ่มงานใหม่')
@section('content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">เพิ่มงานใหม่สำหรับโครงการ {{ $project->project_name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('task.store', $project->project_id) }}" method="post">
            @csrf
                <div class="mb-3">
                    <label for="task_name" class="form-label">ชื่องาน:</label>
                    <input type="text" id="task_name" name="task_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">คำอธิบายงาน:</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">วันที่เริ่มงาน:</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">วันสิ้นสุดงาน:</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">ย้อนกลับ</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection