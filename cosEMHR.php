<?php include('dbconnect.php'); ?>
<?php include('login.php'); ?>
<?php
// คำสั่ง SQL เพื่อดึงข้อมูลของพนักงาน
$username = $_SESSION['id'];
$sql = "SELECT id_emp, email_emp, tel_emp, name_emp, jobtitle_emp, address_emp FROM employees where id_emp = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// ตรวจสอบว่าพนักงานพบหรือไม่
if (!$row) {
    header("location: loginmain.php");
    exit;
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

        .leftcolumn {
            float: left;
            width: 20%;
        }

        .btn {
            width: 1300px;
            padding: 20px;
            margin: 20px auto 0;
            border-radius: 30px;
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
                <li>
                    <a href="HRtrain_history.php?id_emp=<?php echo $username; ?>" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"><a
                                href="HRtrain_history.php?id_emp=<?php echo $username; ?>"></a></svg>
                        <i class="bi bi-clock-history"></i> ประวัติการอบรม
                    </a>
                </li>
                <li class="nav-item">
                    <a href="cosEMHR.php" class="nav-link active" aria-current="page" style="background-color: lightblue; color: white">
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
                <h1>คอร์สการอบรม</h1>
            </center><br>
        </div>

        <div class="wrapper">
            <div class="table  tr:nth-child(even)  tr:nth-child(odd)">
                <div class="th, td tr:hover">
                    <thead>
                        <table border="0.2">
                            <tr>
                                <th>ชื่อคอร์ส</th>
                                <th>รายละเอียด</th>
                                <th>ผู้สอน</th>
                                <th>สถานะ</th>
                                <th>หมวดหมู่</th>
                                <th>สถานที่</th>
                                <th>วันที่</th>
                                <th>เวลาเริ่ม</th>
                                <th>เวลาสิ้นสุด</th>
                                <th>ระยะเวลา/ชั่วโมง</th>
                                <th>คะแนนที่ได้</th>
                                <th>ราคา</th>
                            </tr>


                            <?php
                            $sql = "SELECT c.name_course, c.detail_course, e.name_emp, c.status_course, c.category_course, c.location_course, c.date_course, c.time_start_course, c.time_end_course, c.duration_course, c.point_received, c.price_course
                            FROM course_lists c INNER JOIN employees e ON c.id_master = e.id_emp";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["name_course"] . "</td>";
                                    echo "<td>" . $row["detail_course"] . "</td>";
                                    echo "<td>" . $row["name_emp"] . "</td>";
                                    echo "<td>" . $row["status_course"] . "</td>";
                                    echo "<td>" . $row["category_course"] . "</td>";
                                    echo "<td>" . $row["location_course"] . "</td>";
                                    echo "<td>" . $row["date_course"] . "</td>";
                                    echo "<td>" . $row["time_start_course"] . "</td>";
                                    echo "<td>" . $row["time_end_course"] . "</td>";
                                    echo "<td>" . $row["duration_course"] . "</td>";
                                    echo "<td>" . $row["point_received"] . "</td>";
                                    echo "<td>" . $row["price_course"] . "</td>";
                                }
                            } else {
                                echo "ไม่พบข้อมูลการอบรม";
                            }
                            $conn->close();
                            ?>
                        </table>
                    </thead>
                </div>
            </div>
        </div>
        <a href="HRregister.php"><center>
            <button class="btn align-items-center" type="submit" style="background-color: lightblue; color: white;">
                <i class="bi bi-eye"></i> ลงทะเบียน
            </button>
        </a>
    </div>


</body>

</html>