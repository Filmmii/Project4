@extends('layout')
@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <div class="card-header card-header-primary">
                <h4 class="card-title">Dashboard</h4>
                <p class="card-category">รายละเอียดข้อมูลโครงการทั้งหมด</p>
            </div>
        </div>
    </div>

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
                        <th scope="col">ดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $rp)
                        <tr>
                        <td>{{ $rp->report_id }}</td>
                        <td>{{ $rp->content }}</td>
                        <td>{{ $rp->create_at }}</td>
                        <td>{{ $rp->project_id }}</td>
                        <td>
                            <!-- ปุ่มดูรายละเอียดของโครงการ -->
                            <a href="{{ route('report.details', $rp->report_id) }}"
                                class="btn btn-info btn-sm">ดูรายละเอียด</a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
