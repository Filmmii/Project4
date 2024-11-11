@extends('layout')
@section('title', 'Member Index')
@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Member List</h2>
        <a href="{{ route('member.create') }}" class="btn btn-info">เพิ่มข้อมูล</a>
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
                        <th class="text-center" scope="col">รหัสผู้ใช้</th>
                        <th scope="col">ชื่อจริง</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">อีเมล</th>
                        <th scope="col">เบอร์โทรศัพท์</th>
                        <th scope="col">ดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $mb)
                    <tr>
                        <td class="text-center">{{ $mb->member_id }}</td>
                        <td>{{ $mb->member_firstname }}</td>
                        <td>{{ $mb->member_lastname }}</td>
                        <td>{{ $mb->email }}</td>
                        <td>{{ $mb->phone }}</td>
                        <td>
                            <a href="{{ route('member.edit', $mb->member_id) }}" class="btn btn-warning btn-sm">แก้ไข</a>
                            <form action="{{ route('member.destroy', $mb->member_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('ต้องการลบข้อมูลใช่หรือไม่?')">ลบ</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">ไม่มีข้อมูลสมาชิก</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection