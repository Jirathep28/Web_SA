<?php
session_start();
require('dbconnect.php');
$errors = array();

// เช็คหากมีการรับค่า id_emp ผ่าน URL
if (isset($_GET['id_emp'])) {
    $id_emp = mysqli_real_escape_string($conn, $_GET['id_emp']);
    $sql = 'SELECT
                cl.id_course,
                cl.name_course,
                cl.date_course,
                cl.time_start_course,
                cl.time_end_course,
                cl.point_received,
                cl.price_course,
                tch.status_tch,
                e.name_emp AS employee_name
            FROM
                train_course_history tch
                JOIN course_lists cl ON cl.id_course = tch.id_course
                JOIN employees e ON e.id_emp = tch.id_emp
            WHERE
                tch.id_emp = "' . $id_emp . '"';

    $result = $conn->query($sql);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="customhome.css">

    <style>
        /* เส้นขอบของตาราง */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }


        /* จัดกึ่งกลางเนื้อหาตาราง */
        .table {
            text-align: center;
        }

        /* สีพื้นหลังแถวคูณของตาราง */
        tr:nth-child(even) {
            background-color: white;
        }

        /* สีพื้นหลังแถวคี่ของตาราง */
        tr:nth-child(odd) {
            background-color: lightgray;
        }

        /* เปลี่ยนสีขอบของตารางเมื่อเมาส์ชี้ตัวอ้างอิง */
        tr:hover {
            background-color: #f7f7f7;
            border: 1px solid #007BFF;
            transition: background-color 0.2s;
        }

        .wrapper {
            background-color: rgba(255, 255, 255, 0.493);
            width: 1300px;
            padding: 20px;
            margin: 25px auto 0;
            box-shadow: 10px 10px 5px 5px rgba(102, 102, 102, 0.274);
            border-radius: 30px;
        }

        .wrapper2 {
            background-color: rgb(255, 127, 80);
            color: white;
            width: 1300px;
            padding: 20px;
            margin: 25px auto 0;
            box-shadow: 10px 10px 5px 5px rgba(102, 102, 102, 0.274);
            border-radius: 30px;
        }

        .leftcolumn {
            float: left;
            width: 20%;
        }
    </style>

</head>

<body>


    <div class="leftcolumn">

        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary"
            style="height: 931px; width: 230px; overflow-y: auto;" ms-auto>

            <a href="/"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4"><i class="bi bi-people-fill"></i> HR</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="homeHR.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"><a href="homeHR.php"></a></svg>
                        <i class="bi bi-house-door"></i> Home
                    </a>
                </li>
                <li>
                    <a href="HRhomeemployees.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"><a href="HRhomeemployees.html"></a></svg>
                        <i class="bi bi-emoji-laughing"></i> ข้อมูลส่วนตัว
                    </a>
                </li>
                <li class="nav-item">
                    <a href="HRtrain_history.php" class="nav-link active" aria-current="page"
                        style="background-color: lightblue;">
                        <svg class="bi pe-none me-2" width="16" height="16"><a href="HRtrain_history.php"></a></svg>
                        <i class="bi bi-house-door"></i> ประวัติการอบรม
                    </a>
                </li>
                <li>
                    <a href="cosEMHR.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"><a href="cosEMHR.php"></a></svg>
                        <i class="bi bi-search"></i> คอร์สการอบรม
                    </a>
                </li>
                <li>
                    <a href="HRregister.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"><a href="HRregister.php"></a></svg>
                        <i class="bi bi-check2-circle"></i> ลงทะเบียน
                    </a>
                </li>
                <li>
                    <a href="course_statusHR.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"><a href="course_statusHR.php"></a></svg>
                        <i class="bi bi-check2-circle"></i> สถานะการลงทะเบียน
                    </a>
                </li>
                <li>
                    <a href="HReditem.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"><a href="HRregister.php"></a></svg>
                        <i class="bi bi-pencil-square"></i></i> แก้ไขข้อมูล
                    </a>
                </li>
                <li>
                    <a href="HReditAll.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"><a href="HReditAll.php"></a></svg>
                        <i class="bi bi-pencil-square"></i></i> จัดการพนักงาน
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="loginmain.php" class="d-flex align-items-center  text-decoration-none"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <button class="btn btn-outline-secondary" type="button" style="color: black;">
                        <i class="bi bi-box-arrow-left"></i> ออกจากระบบ
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="rightcolumn">
        <div class="wrapper">
            <center>
                <h1>ประวัติการเข้าอบรม</h1><br>
            </center>
        </div>
        <br>
        <div class="wrapper">
            <table class="table tr:nth-child tr:nth-child tr:hover">
                <thead>
                    <tr>
                        <th>ชื่อคอร์ส</th>
                        <th>วันที่</th>
                        <th>เวลาเริ่ม - เลิก</th>
                        <th>คะแนนทักษะที่ได้รับ</th>
                        <th>ราคา</th>
                        <th>ผลการอบรม</th>
                        <th>พิมพ์</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($result) && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                        <td>' . $row['name_course'] . '</td>
                        <td>' . $row['date_course'] . '</td>
                        <td>' . $row['time_start_course'] . ' - ' . $row['time_end_course'] . '</td>
                        <td>' . $row['point_received'] . '</td>
                        <td>' . $row['price_course'] . '</td>
                        <td>' . $row['status_tch'] . '</td>
                        <td>';
                        if ($row["status_tch"] == "อบรมเสร็จสิ้น") {
                        echo '<a href="generate_certificate.php?id=' . $row['id_course'] . '&employee_name=' . $row['employee_name'] . '&course_name=' . $row['name_course'] . '" 
                        class="btn btn-sm btn-primary" style="width: 100px;">พิมพ์</a>';
                        }
                        echo '</td>
                        </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">ไม่พบประวัติการอบรม</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>





</body>

</html>