@extends('layout')
@section('title','แบบฟอร์มแก้ไขข้อมูล')
@section('content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">แก้ไขข้อมูลโครงการ</h5>
        </div>
        <div class="card-body">
            <form name="edit_project" action="{{ route('project.update', $project->project_id) }}" method="post">
                @csrf
                @method("PUT")

                <!-- Project Edit Form -->
                <div class="mb-3">
                    <label for="project_id" class="form-label">รหัสโครงการ :</label>
                    <input type="text" id="project_id" name="project_id" readonly value="{{ $project->project_id }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="project_name" class="form-label">ชื่อโครงการ :</label>
                    <input type="text" id="project_name" name="project_name" value="{{ $project->project_name }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="objective" class="form-label">วัตถุประสงค์โครงการ :</label>
                    <input type="text" id="objective" name="objective" value="{{ $project->objective }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="budget" class="form-label">งบประมาณ :</label>
                    <input type="text" id="budget" name="budget" value="{{ $project->budget }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">วันที่เริ่มโครงการ :</label>
                    <input type="date" id="start_date" name="start_date" value="{{ $project->start_date }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">วันสิ้นสุดโครงการ :</label>
                    <input type="date" id="end_date" name="end_date" value="{{ $project->end_date }}" class="form-control">
                </div>
                
                <!-- Buttons -->
                <div class="text-center">
                    <button type="reset" onclick="window.history.back()" class="btn btn-danger">ยกเลิก</button>
                    <button type="submit" class="btn btn-success">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection