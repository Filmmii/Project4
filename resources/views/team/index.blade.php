@extends('layout')
@section('title', 'Team Index')

@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Team List</h2>
        <a href="{{ route('team.create') }}" class="btn btn-info">เพิ่มข้อมูลทีม</a>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table align-items-center table-striped mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">รหัสทีม</th>
                        <th scope="col">ชื่อทีม</th>
                        <th scope="col">รหัสโครงการที่เกี่ยวข้อง</th>
                        <th scope="col">จำนวนสมาชิก</th>
                        <th scope="col">ดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teams as $team)
                    <tr>
                        <td class="text-center">{{ $team->team_id }}</td>
                        <td>{{ $team->team_name }}</td>
                        <td>{{ $team->project_id }}</td>
                        <td>{{ $team->members_count }}</td> <!-- Display member count here -->
                        <td>
                            <a href="{{ route('team.edit', $team->team_id) }}" class="btn btn-info btn-sm">แก้ไข</a>

                            <form action="{{ route('team.destroy', $team->team_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('ต้องการลบข้อมูลทีมใช่หรือไม่?')">ลบ</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">ไม่มีข้อมูลทีม</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection