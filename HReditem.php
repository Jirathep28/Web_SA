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
                <li>
                    <a href="cosEMHR.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"><a href="cosEMHR.php"></a></svg>
                        <i class="bi bi-search"></i> คอร์สการอบรม
                    </a>
                </li>
                <li class="nav-item">
                    <a href="HRregister.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"></svg>
                        <i class="bi bi-check2-circle"></i> ลงทะเบียน
                    </a>
                </li>
                <li>
                    <a href="course_statusHR.php" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16"><a href="course_statusHR.php"></a></svg>
                        <i class="bi bi-check2-circle"></i> สถานะการลงทะเบียน
                    </a>
                </li>

                <li class="nav-item">
                    <a href="HReditem.php" class="nav-link active" aria-current="page"
                        style="background-color: lightblue;">
                        <svg class="bi pe-none me-2" width="16" height="16"></svg>
                        <i class="bi bi-pencil-square"></i> แก้ไขข้อมูล
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
                <h1>แก้ไขข้อมูล</h1>
            </center><br>
        </div>

        <form action="HReditEmphp.php" method="POST">
            <div class="wrapper">
                <div class="row g-3">
                    <div class="col-6">
                        <label for="email_emp">อีเมล:</label>
                        <input type="email" name="email_emp" required="" class="form-control"><br>
                    </div>
                    <div class="col-6">
                        <label for="tel_emp">เบอร์โทรศัพท์:</label>
                        <input type="text" name="tel_emp" required="" class="form-control"><br>
                    </div>
                    <div class="col-12">
                        <label for="address_emp">ที่อยู่:</label>
                        <input type="address" name="address_emp" required="" class="form-control"><br>
                    </div>
                    <div class="col-3">
                        <label for="religion_emp">ศาสนา:</label>
                        <select class="form-select" required="" name="religion_emp">
                            <option value="พุทธ">พุทธ</option>
                            <option value="คริสต์">คริสต์</option>
                            <option value="อิสลาม">อิสลาม</option>
                            <option value="ฮินดู">ฮินดู</option>
                            <option value="พราหมณ์">พราหมณ์</option>
                            <option value="ไม่ระบุ">ไม่ระบุ</option>
                        </select>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="nationality_emp">สัญชาติ:</label>
                        <input type="text" name="nationality_emp" required="" class="form-control"><br>
                    </div>
                </div>
            </div>

            <div class="wrapper">
                <div class="row g-3">
                    <div class="col-6">
                        <label for="pass_emp" class="form-label">รหัสผ่าน:</label>
                        <input type="password" name="pass_emp" required="" class="form-control"><br>
                    </div>
                    <div class="col-6">
                        <label for="pass_emp2" class="form-label">ยืนยันรหัสผ่าน:</label>
                        <input type="password" name="pass_emp2" required="" class="form-control"><br>
                    </div>
                </div>
            </div>


            <div class="btn-2"><center>
                <button class="btn align-items-center" type="submit" style="background-color: lightblue; color: white;">
                    <i class="bi bi-check2-circle"></i> ยืนยันการแก้ไข
                </button>
                </a>
            </div>
        </form>
    </div>


</body>

</html>