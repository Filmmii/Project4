@extends('layout')
@section('title', 'เพิ่มทีมใหม่')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">เพิ่มทีมใหม่</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('team.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="team_name">ชื่อทีม:</label>
                    <input type="text" name="team_name" id="team_name" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="project_id">รหัสโครงการที่เกี่ยวข้อง:</label>
                    <input type="text" name="project_id" id="project_id" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>สมาชิกทีม:</label>
                    <select name="members[]" class="form-control" multiple>
                        @foreach ($members as $member)
                            <option value="{{ $member->member_id }}">{{ $member->member_firstname }} {{ $member->member_lastname }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">กด Ctrl เพื่อเลือกหลายคน</small>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                    <a href="{{ route('team.index') }}" class="btn btn-secondary">ยกเลิก</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection