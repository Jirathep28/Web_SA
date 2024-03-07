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
    <link rel="PHP" href="HRreGis.php">


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
                    <a href="HRregister.php" class="nav-link active" aria-current="page"
                        style="background-color: lightblue;">
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

                <li>
                <a href="HReditem.php" class="nav-link link-body-emphasis">
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

    <form action="HRreGis.php" method="post">
        <div class="rightcolumn">
            <div class="wrapper">
                <center>
                    <h1>ลงทะเบียน</h1>
                </center><br>
            </div>

            <div class="wrapper">


                <div class="col-12">
                    <label for="address" class="form-label">หมายเหตุ</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required=""
                        name="address">
                    <div class="invalid-feedback">
                        กรุณากรอกหมายเหตุ
                    </div>
                </div>

                <?php
                $sql = 'SELECT id_course,name_course FROM course_lists';

                $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                ?>

                <div class="col-md-5">
                    <label for="country" class="form-label">ค้นหาหลักสูตร</label>
                    <select class="form-select" id="country" required="" name="country">
                        <?php
                        while ($objResult = mysqli_fetch_array($objQuery)) {
                            ?>
                            <option value=<?php echo $objResult["id_course"]; ?>> <?php echo $objResult["name_course"]; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div><center>
            
            <div class="btn">
            <button class="btn align-items-center" type="submit" style="background-color: lightblue; color: white;">
                <i class="bi bi-check2-circle"></i> ยืนยันการลงทะเบียน 
            </button>
        </div>

        </div>

         
    </form>

</body>

</html>