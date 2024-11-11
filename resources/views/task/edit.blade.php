@extends('layout')
@section('title','แบบฟอร์มแก้ไขข้อมูล')
@section('content')
<form name="edit_task" action="{{ route('task.update', $task->task_id) }}" method="post">
    @csrf
    @method("PUT")
    <table class="table table-striped">
        <tr>
            <td>รหัสงาน :</td>
            <td><input type=text name="task_id" readonly value="{{$task->task_id}}"></td>
        </tr>
        <tr>
            <td>ผู้ที่ได้รับมอบหมายงาน :</td>
            <td><input type=text name="assigned_to" value="{{ $task->assigned_to }}"></td>
        </tr>
        <tr>
            <td>ชื่องาน :</td>
            <td><input type=text name="task_name" value="{{$task->task_name}}"></td>
        </tr>
        <tr>
            <td>รายละเอียด :</td>
            <td><input type=text name="description" value="{{$task->description}}"></td>
        </tr>
        <tr>
            <td>สถานะ :</td>
            <td><input type=text name="status" value="{{$task->status}}"></td>
        </tr>
        <tr>
            <td>วันที่เริ่มโครงการ :</td>
            <td><input type=date name="start_date" value="{{$task->start_date}}"></td>
        </tr>
        <tr>
            <td>วันสิ้นสุดโครงการ :</td>
            <td><input type=date name="end_date" value="{{$task->end_date}}"></td>
        </tr>
        <tr>
            <td>รหัสโครงการ :</td>
            <td><input type=text name="project_id" readonly value="{{$task->project_id}}"></td>
        </tr>
        <tr>
            <td colspan=2>
                <button type="reset" onclick="window.history.back()" class="btn btn-danger">ยกเลิก</button>
                <button type="submit" class="btn btn-success">บันทึก</button>
            </td>
        </tr>
    </table>
</form>
@endsection