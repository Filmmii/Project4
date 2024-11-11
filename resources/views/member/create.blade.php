@extends('layout')
@section('title', 'เพิ่มข้อมูลสมาชิก')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">เพิ่มข้อมูลสมาชิก</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('member.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="member_firstname">ชื่อจริง:</label>
                    <input type="text" name="member_firstname" id="member_firstname" class="form-control" value="{{ old('member_firstname') }}" required>
                    @error('member_firstname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="member_lastname">นามสกุล:</label>
                    <input type="text" name="member_lastname" id="member_lastname" class="form-control" value="{{ old('member_lastname') }}" required>
                    @error('member_lastname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email">อีเมล:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password">รหัสผ่าน:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="phone">เบอร์โทรศัพท์:</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                    <a href="{{ route('member.index') }}" class="btn btn-secondary">ยกเลิก</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection