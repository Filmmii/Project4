<html>
    <head>
        <title>Show Notifications</title>
    </head>
    <body>
        <table border=1>
            <tr>
                <td>รหัสแจ้งเตือน</td>
                <td>เนื้อหา</td>
                <td>สถานะข้อความ</td>
                <td>เวลาประทับตรา</td>
                <td>รหัสสมาชิก</td> <!-- member_id -->
            </tr>
            @foreach ($notifications as $n)
            <tr>
                <td>{{ $n->notification_id }}</td>
                <td>{{ $n->content }}</td>
                <td>{{ $n->is_read }}</td>
                <td>{{ $n->timestamp }}</td>
                <td>{{ $n->member_id }}</td>
            </tr>
        @endforeach
        </table>
    </body>
</html>