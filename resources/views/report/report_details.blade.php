@extends('layout')
@section('title', 'รายละเอียดโครงการ')
@section('content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">รายละเอียดโครงการ - {{ $report->project->project_name }}</h5>
        </div>
        <div class="card-body">
            <h6>ข้อมูลโครงการ</h6>
            <p><strong>รหัสโครงการ:</strong> {{ $report->project->project_id }}</p>
            <p><strong>ชื่อโครงการ:</strong> {{ $report->project->project_name }}</p>
            <p><strong>วัตถุประสงค์โครงการ:</strong> {{ $report->project->objective }}</p>
            <p><strong>งบประมาณ:</strong> {{ number_format($report->project->budget, 2) }}</p>
            <p><strong>วันที่เริ่มโครงการ:</strong> {{ $report->project->start_date }}</p>
            <p><strong>วันสิ้นสุดโครงการ:</strong> {{ $report->project->end_date }}</p>

            <!-- Button to go back -->
            <button type="reset" onclick="window.history.back()" class="btn btn-danger">ย้อนกลับ</button> 
        

            <h6 class="mt-4">รายการงานที่เกี่ยวข้อง</h6>
            @if($report->project->tasks->isEmpty())
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report->project->tasks as $task)
                            <tr>
                                <td>{{ $task->task_id }}</td>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->start_date }}</td>
                                <td>{{ $task->end_date }}</td>
                                <td>
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
