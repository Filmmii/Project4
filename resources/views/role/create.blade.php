@extends('layout')
@section('title','แบบฟอร์มเพิ่มข้อมูล')
@section('content')
<form name="create_role" action="{{ route('role.store')}}" method="post">
    @csrf
    @method("POST")
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}
            <li>
                @endforeach
        </ul>
    </div>
    @endif
    <table class="table table-striped">
    <tr>
            <td>รหัสหน้าที่ :</td>
            <td><input type="text" name="role_id" readonly value="{{ $role_id +1 }}"></td>
        </tr>
        <tr>
            <td>หน้าที่ :</td>
            <td><input type="text" name="role_name"></td>
        </tr>
        <tr>
            <td colspan=2>
                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                <button type="submit" class="btn btn-success">บันทึก</button>
            </td>
        </tr>
    </table>
</form>
@endsection