<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- ไอคอนสำหรับ Apple -->
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <!-- ไอคอน Favicon -->
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <title>
        @yield('title', '') | Project Management System
    </title>

    <!-- โหลดฟอนต์ Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- ไอคอน Nucleo -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- ไอคอน Font Awesome -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- ไฟล์ CSS ของหน้าเว็บ -->
    <link id="pagestyle" href="/assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
    <!-- แถบสีพื้นหลังและส่วนด้านข้าง -->
    <div class="min-height-100 bg-dark position-absolute w-100"></div>
    <!-- เริ่มส่วนด้านข้าง (sidenav) -->
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
        id="sidenav-main">
        <div class="sidenav-header">
            <!-- ปุ่มปิดสำหรับหน้าเล็ก -->
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <!-- โลโก้และชื่อแบรนด์ -->
            <a class="navbar-brand m-0" target="_blank">
                <img src="/assets/img/logos/logo1.png" width="26px" height="26px" class="navbar-brand-img h-100"
                    alt="main_logo">
                <span class="ms-1 font-weight-bold">Project Management</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <!-- เริ่มรายการเมนูในแถบด้านข้าง -->
        <div class="collapse navbar-collapse w-auto" style="height: auto !important;" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <!-- เมนู Dashboard -->
                <li class="nav-item">
                    <a class="nav-link {{ $currentPage === 'dashboard' ? 'active' : '' }}" href="/dashboard">
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <!-- เมนู Project -->
                <li class="nav-item">
                    <a class="nav-link {{ $currentPage === 'project' ? 'active' : '' }}" href="/project">
                        <span class="nav-link-text ms-1">Project</span>
                    </a>
                </li>
                <!-- เมนู My Team -->
                <li class="nav-item">
                    <a class="nav-link {{ $currentPage === 'my-team' ? 'active' : '' }}" href="/my-team">
                        <span class="nav-link-text ms-1">My Team</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Setting</h6>
                </li>
                <!-- เมนู Team -->
                <li class="nav-item">
                    <a class="nav-link {{ $currentPage === 'team' ? 'active' : '' }}" href="/team">
                        <span class="nav-link-text ms-1">Team</span>
                    </a>
                </li>
                <!-- เมนู Member -->
                <li class="nav-item">
                    <a class="nav-link {{ $currentPage === 'member' ? 'active' : '' }}" href="/member">
                        <span class="nav-link-text ms-1">Member</span>
                    </a>
                </li>
                <!-- เมนู Message -->
                <li class="nav-item">
                    <a class="nav-link {{ $currentPage === 'message' ? 'active' : '' }}" href="/message">
                        <span class="nav-link-text ms-1">Message</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- ส่วนท้ายของเมนูด้านข้าง (sidenav) -->
    </aside>
    <main class="main-content position-relative border-radius-lg">
        <!-- เริ่มแถบเมนูด้านบน (Navbar) -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <!-- เส้นทางการนำทางในหน้าเว็บ -->
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                href="javascript:;">Project4</a></li>
                        <!-- <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li> -->
                    </ol>
                    <!-- ชื่อหน้าปัจจุบัน -->
                    <h6 class="font-weight-bolder text-white mb-0">ระบบบจัดการโครงการ</h6>
                </nav>
                <!-- เมนูการตั้งค่าและการแจ้งเตือน -->
                <ul class="navbar-nav justify-content-end">

                    <!-- เมนูแสดงชื่อผู้ใช้งาน (ในกรณีนี้แสดงคำว่า "I'm User") -->
                    <li class="text-white">
                        <div>I'm User</div>
                    </li>

                    <!-- ปุ่มแชท -->
                    <li class="text-white">
                        <a class="nav-link" href="/message">
                            <i class="bx bxs-chat" style="color: white;"></i> <!-- ไอคอนแชทเป็นสีขาว -->
                        </a>
                    </li>


                   <!-- <li class="text-white">
                        <a class="nav-link" href="/message"><i class='bx bxs-chat'></i></a>
                    </li> -->

                    <!-- ปุ่มเปิด/ปิดเมนูด้านข้างบนหน้าจอขนาดเล็ก -->
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                    </li>

                    <!-- ปุ่มแสดงการแจ้งเตือน -->
                    <li class="nav-item dropdown px-3 pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i> <!-- ไอคอนการแจ้งเตือน -->
                            <span id="noti_number"
                                class="badge bg-danger rounded-circle position-absolute top-0 start-100 translate-middle p-1"></span>
                            <!-- จำนวนแจ้งเตือน -->
                        </a>

                        <!-- เมนูรายการแจ้งเตือน -->
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">


                            <!-- รายการแจ้งเตือนใหม่ -->
                            <!-- เมนูรายการแจ้งเตือน -->
                            <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton" id="notificationMenu">
                                <!-- รายการแจ้งเตือนจะแสดงที่นี่แบบไดนามิก -->
                            </ul>
                    </li>

                    <script type="text/javascript">
                    function loadNotifications() {
                        // ใช้ setInterval เพื่อเรียกข้อมูลแจ้งเตือนทุก 5 วินาที
                        setInterval(function() {
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    // ดึงจำนวนแจ้งเตือนที่ยังไม่ได้อ่าน
                                    var response = JSON.parse(this.responseText);
                                    document.getElementById("noti_number").innerText = response
                                    .unread_count;
                                    // แสดงรายการแจ้งเตือน
                                    document.getElementById("notificationMenu").innerHTML = response
                                        .notifications;
                                }
                            };
                            xhttp.open("GET", "fetch_notifications.php", true);
                            xhttp.send();
                        }, 5000); // อัปเดตทุก 5 วินาที
                    }

                    loadNotifications();
                    </script>
        </nav>
        <!-- ปิด Navbar -->
        <div class="container-fluid py-4 mt-3">
            @yield('content')
            <!-- ส่วนที่ใช้แสดงเนื้อหาหลักของแต่ละหน้า (Dynamic Content) -->
        </div>
    </main>
    <!-- ไฟล์ JS หลักที่จำเป็นสำหรับการทำงาน -->
    <script src="/assets/js/core/popper.min.js"></script> <!-- ไฟล์ Popper.js ช่วยจัดการการแสดงผล Tooltip -->
    <script src="/assets/js/core/bootstrap.min.js"></script> <!-- ไฟล์ Bootstrap JavaScript สำหรับส่วนประกอบ UI -->
    <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!-- ปลั๊กอินสำหรับการจัดการ Scrollbar ให้สวยงาม -->
    <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- ปลั๊กอินเพื่อให้ Scrollbar ลื่นไหลมากขึ้น -->
    <script src="/assets/js/plugins/chartjs.min.js"></script> <!-- Chart.js สำหรับการสร้างกราฟ -->

    <script>
    // ตรวจสอบว่าผู้ใช้ใช้งานบนระบบ Windows หรือไม่
    var win = navigator.platform.indexOf('Win') > -1;
    // ถ้าใช้งาน Windows และมีส่วน sidenav-scrollbar ให้ใช้ Scrollbar แบบพิเศษ
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5' // ตั้งค่าความหนืดในการเลื่อน Scrollbar
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options); // เริ่มต้น Scrollbar ตามที่กำหนด
    }
    </script>

    <!-- ปุ่ม GitHub -->
    <script async defer src="https://buttons.github.io/buttons.js"></script> <!-- สคริปต์สำหรับแสดงปุ่ม GitHub -->

    <!-- Control Center for Soft Dashboard: สำหรับเอฟเฟกต์พารัลแลกซ์และสคริปต์ต่างๆ -->
    <script src="/assets/js/argon-dashboard.min.js?v=2.1.0"></script> <!-- สคริปต์หลักของ Argon Dashboard -->
</body>

</html>