<?php include('dbconnect.php'); ?>
<?php include('login.php'); ?>

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

    <div class="wrapper">
        <center>
            <h1>ข้อมูลพนักงานทั้งหมด</h1>
        </center><br>
    </div>

    <div class="wrapper">

    <?php
// Include necessary files and start the session.

// ตรวจสอบว่าค่า 'id' ถูกส่งมาผ่าน URL
if (isset($_GET['id'])) {
    $id_course = $_GET['id'];

    // สร้างคำสั่ง SQL เพื่อดึงข้อมูลพนักงานตาม 'id_emp' ที่ส่งมา
    $sql = "SELECT * FROM course_lists WHERE id_course = '$id_course'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // แสดงข้อมูลใน text box
        ?>


            <div class="row g-3">
                <div class="col-12">
                    <label for="name_course">ชื่อคอร์ส</label>
                    <input type="text" name="name_course" id="name_course" class="form-control"
                        value="<?php echo $row['name_course']; ?>" disabled>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="id_master">ผู้สอน:</label>
                        <input type="text" name="id_master" id="id_master" class="form-control"
                            value="<?php echo $row['id_master']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-md-3">
                        <label for="detail_course">รายละเอียดคอร์ส:</label>
                        <input type="text" name="detail_course" id="detail_course" class="form-control"
                            value="<?php echo $row['detail_course']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-md-3">
                        <label for="status_course">สถานะ:</label>
                        <input type="text" name="status_course" id="status_course" class="form-control"
                            value="<?php echo $row['status_course']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-10">
                        <label for="category_course">หมวดหมู่:</label>
                        <input type="text" name="category_course" id="category_course" class="form-control"
                            value="<?php echo $row['category_course']; ?>" disabled>
                    </div>
                    <br>

                    <br>
                    <div class="col-12">
                        <label for="location_course">ที่จัด:</label>
                        <input type="text" name="location_course" id="location_course" class="form-control"
                            value="<?php echo $row['location_course']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-2">
                        <label for="date_course">วันที่จัด:</label>
                        <input type="text" name="date_course" id="date_course" class="form-control"
                            value="<?php echo $row['date_course']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-3">
                        <label for="time_start_course">เวลาเริ่ม:</label>
                        <input type="text" name="time_start_course" id="time_start_course" class="form-control"
                            value="<?php echo $row['time_start_course']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-2">
                        <label for="time_end_course">เวลาเลิก:</label>
                        <input type="text" name="time_end_course" id="time_end_course" class="form-control"
                            value="<?php echo $row['time_end_course']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-md-2">
                        <label for="duration_course">ระยะเวลา(ชั่วโมง):</label>
                        <input type="text" name="duration_course" id="duration_course" class="form-control"
                            value="<?php echo $row['duration_course']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-md-1">
                        <label for="duration_course">ระยะเวลา:</label>
                        <input type="text" name="duration_course" id="duration_course" class="form-control"
                            value="<?php echo $row['duration_course']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-md-1">
                        <label for="point_received">คะแนน:</label>
                        <input type="text" name="point_received" id="point_received" class="form-control"
                            value="<?php echo $row['point_received']; ?>" disabled>
                    </div>
                    <br>
                    <div class="col-md-2">
                        <label for="price_course">ราคาคอร์ส:</label>
                        <input type="text" name="price_course" id="price_course" class="form-control"
                            value="<?php echo $row['price_course']; ?>" disabled>
                    </div>
                    <br>
                </div>
                <?php
            } else {
                echo "ไม่พบข้อมูลพนักงานรหัส $id_emp";
            }

        } else {
            echo "ไม่พบข้อมูลพนักงานรหัส $id_emp";
        }

        // ปิดการเชื่อมต่อกับฐานข้อมูล
        $conn->close();
        ?>

        </div>
    </div>

        <center>
            <a href="courseHR.php">
                <button class="btn" type="submit" style="background-color: coral; color: white;">
                    <i class="bi bi-house-door"></i> กลับไปยังหน้าหลัก
                </button>
            </a>
        </center>

</body>