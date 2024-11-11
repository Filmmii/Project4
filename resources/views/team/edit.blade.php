@extends('layout')
@section('title', 'แก้ไขทีม')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">แก้ไขทีม</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('team.update', $team->team_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="team_name">ชื่อทีม:</label>
                    <input type="text" name="team_name" id="team_name" class="form-control" value="{{ $team->team_name }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="project_project_id">รหัสโครงการที่เกี่ยวข้อง:</label>
                    <input type="text" name="project_id" id="project_id" class="form-control" value="{{ $team->project_id }}" required>
                </div>

                <!-- Display current members in team -->
                <div class="form-group mb-3">
                    <label>สมาชิกในทีม:</label>
                    <ul class="list-group">
                        @foreach ($membersInTeam as $member)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $member->member_firstname }} {{ $member->member_lastname }}
                                <span class="badge bg-primary">{{ $member->email }}</span>

                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Add new members to the team -->
                <div class="form-group mb-3">
                    <label>เพิ่มสมาชิกใหม่:</label>
                    <select name="members[]" class="form-control" multiple>
                        @foreach ($availableMembers as $member)
                            <option value="{{ $member->member_id }}">
                                {{ $member->member_firstname }} {{ $member->member_lastname }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">กด Ctrl เพื่อเลือกหลายคน</small>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success">อัปเดต</button>
                    <a href="{{ route('team.index') }}" class="btn btn-secondary">ยกเลิก</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection