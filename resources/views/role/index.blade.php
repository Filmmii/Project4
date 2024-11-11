@extends('layout')
@section('title','ระบบโครงการ')
@section('content')
<div>
    <a href="{{ route('role.create') }}"> <button type="button" class="btn btn-info">เพิ่มข้อมูล</button></a>
</div>

<html>

<head>
    <title>Show Role</title>
</head>

<body>
    <table class="table table">
        <thead class="thead-dark">
            <tr>
                <td>รหัสหน้าที่</td>
                <td>หน้าที่</td>
                <td>ดำเนินการ</td>

            </tr>
            @foreach ($role as $r)
            <tr>
                <td>{{ $r->role_id }}</td>
                <td>{{ $r->role_name }}</td>
                <td>
                    <button class="btn btn-warning"><a href="{{ route('role.edit',$r->role_id)}}">แก้ไข</a></button>
                    <form action="{{ route('role.destroy',$r->role_id) }}" method="POST">
                </td>
                @csrf
                @method("DELETE")
                <td>
                    <button type=submit class="btn btn-danger"
                        onclick="return confirm('ต้องการลบข้อมูลใช่หรือไม่?')">ลบ</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endsection
    </table>
</body>

</html>
<end>