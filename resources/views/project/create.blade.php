@extends('layout')
@section('title','แบบฟอร์มเพิ่มข้อมูล')
@section('content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">เพิ่มข้อมูลโครงการ</h5>
        </div>
        <div class="card-body">
            <form name="create_project" action="{{ route('project.store') }}" method="post">
                @csrf
                @method("POST")

                <!-- Error Display -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Project Creation Form -->
                <div class="mb-3">
                    <label for="project_id" class="form-label">รหัสโครงการ :</label>
                    <input type="text" id="project_id" name="project_id" readonly value="{{ $project_id + 1 }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="project_name" class="form-label">ชื่อโครงการ :</label>
                    <input type="text" id="project_name" name="project_name" value="{{ old('project_name') }}" placeholder="ชื่อโครงการ" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="objective" class="form-label">วัตถุประสงค์โครงการ :</label>
                    <input type="text" id="objective" name="objective" value="{{ old('objective') }}" placeholder="วัตถุประสงค์โครงการ" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="budget" class="form-label">งบประมาณ :</label>
                    <input type="number" id="budget" name="budget" value="{{ old('budget') }}" placeholder="งบประมาณ" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">วันที่เริ่มโครงการ :</label>
                    <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">วันสิ้นสุดโครงการ :</label>
                    <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" class="form-control">
                </div>
                
                <div class="text-center">
                    <button type="reset" onclick="window.history.back()" class="btn btn-danger">ยกเลิก</button>
                    <button type="submit" class="btn btn-success">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection