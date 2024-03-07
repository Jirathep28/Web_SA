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

</head>

<body>

    <div class="leftcolumn">

        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="height: 931px; width: 230px;" ms-auto>

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
                <li class="nav-item">
                    <a href="HRhomeemployees.php" class="nav-link active" aria-current="page"
                        style="background-color: lightblue;">
                        <svg class="bi pe-none me-2" width="16" height="16"><a href="HRhomeemployees.php"></a></svg>
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
                        <svg class="bi pe-none me-2" width="16" height="16"><a href="HReditem.php"></a></svg>
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

    <!---->
    <div class="rightcolumn">
        <div class="wrapper">
            <center>
                <h1>ข้อมูลส่วนตัว</h1>
            </center><br>
        </div>

        <div class="wrapper">

            <?php

            $username = $_SESSION['id'];
            // สร้างคำสั่ง SQL เพื่อดึงข้อมูลพนักงาน
            $sql = "SELECT id_emp, email_emp, tel_emp, name_emp, jobtitle_emp, address_emp FROM employees where id_emp = '$username'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // แสดงข้อมูลใน text box
                ?>
                <div class="row g-3">
                    <div class="col-6">
                        <label for="name_emp">ชื่อ-นามสกุล</label>
                        <input type="text" name="name_emp" id="name_emp" class="form-control"
                            value="<?php echo $row['name_emp']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-md-5">
                        <label for="id_emp">รหัสพนักงาน:</label>
                        <input type="text" name="id_emp" id="id_emp" class="form-control"
                            value="<?php echo $row['id_emp']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-12">
                        <label for="email_emp">อีเมล:</label>
                        <input type="text" name="email_emp" id="email_emp" class="form-control"
                            value="<?php echo $row['email_emp']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-12">
                        <label for="tel_emp">เบอร์โทรศัพท์:</label>
                        <input type="text" name="tel_emp" id="tel_emp" class="form-control"
                            value="<?php echo $row['tel_emp']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-12">
                        <label for="tel_emp">ที่อยู่:</label>
                        <input type="text" name="address_emp" id="address_emp" class="form-control"
                            value="<?php echo $row['address_emp']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-md-5">
                        <label for="jobtitle_emp">ตำแหน่ง:</label>
                        <input type="text" name="jobtitle_emp" id="jobtitle_emp" class="form-control"
                            value="<?php echo $row['jobtitle_emp']; ?>" disabled>
                    </div>
                    <br>
                </div>
                <?php


            } else {
                echo "ไม่พบข้อมูลพนักงานรหัส $id_emp";
            }

            // ปิดการเชื่อมต่อกับฐานข้อมูล
            $conn->close();
            ?>

        </div>
        <a href="HRallDataEmp.php?id=<?php echo $username; ?>"><center>
            <button class="btn align-items-center" type="submit" style="background-color: lightblue; color: white;">
                <i class="bi bi-eye"></i> ดูข้อมูลส่วนตัวทั้งหมด
            </button>
        </a>
    </div>




</body>

</html>