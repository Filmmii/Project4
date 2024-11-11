<html>
    <head>
        <title>Show Member_has_Role</title>
    </head>
    <body>
        <table border=1>
            <tr>
                <td>รหัสผู้ใช้</td>
                <td>รหัสหน้าที่ของผู้ใช้</td>
                <td>รหัสโครงการที่ผู้ใช้เกี่ยวข้อง</td>
                
            </tr>
            @foreach ($member_has_role as $mhr)
            <tr>
                <td>{{ $mhr->member_id }}</td>
                <td>{{ $mhr->role_id }}</td>
                <td>{{ $mhr->project_id }}</td>
            </tr>
        @endforeach
        </table>
    </body>
</html>