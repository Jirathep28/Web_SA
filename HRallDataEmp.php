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
            $id_emp = $_GET['id'];

            // สร้างคำสั่ง SQL เพื่อดึงข้อมูลพนักงานตาม 'id_emp' ที่ส่งมา
            $sql = "SELECT * FROM employees WHERE id_emp = '$id_emp'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // แสดงข้อมูลใน text box
                ?>


                <div class="row g-3">
                    <div class="col-12">
                        <label for="name_emp">ชื่อ-นามสกุล</label>
                        <input type="text" name="name_emp" id="name_emp" class="form-control"
                            value="<?php echo $row['name_emp']; ?>" disabled>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="pass_emp">รหัสผ่าน:</label>
                            <input type="text" name="pass_emp" id="pass_emp" class="form-control"
                                value="<?php echo $row['pass_emp']; ?>" disabled>
                        </div>
                        <br>
                        <div class="col-md-3">
                            <label for="id_emp">รหัสพนักงาน:</label>
                            <input type="text" name="id_emp" id="id_emp" class="form-control"
                                value="<?php echo $row['id_emp']; ?>" disabled>
                        </div>
                        <br>
                        <div class="col-md-3">
                            <label for="id_card_number_emp">เลขบัตรประชาชน:</label>
                            <input type="text" name="id_card_number_emp" id="id_card_number_emp" class="form-control"
                                value="<?php echo $row['id_card_number_emp']; ?>" disabled>
                        </div>
                        <br>
                        <div class="col-10">
                            <label for="email_emp">อีเมล:</label>
                            <input type="text" name="email_emp" id="email_emp" class="form-control"
                                value="<?php echo $row['email_emp']; ?>" disabled>
                        </div>
                        <br>
                        <div class="col-7">
                            <label for="tel_emp">เบอร์โทรศัพท์:</label>
                            <input type="text" name="tel_emp" id="tel_emp" class="form-control"
                                value="<?php echo $row['tel_emp']; ?>" disabled>
                        </div>
                        <br>
                        <div class="col-12">
                            <label for="address_emp">ที่อยู่:</label>
                            <input type="text" name="address_emp" id="address_emp" class="form-control"
                                value="<?php echo $row['address_emp']; ?>" disabled>
                        </div>
                        <br>
                        <div class="col-2">
                            <label for="nationality_emp">สัญชาติ:</label>
                            <input type="text" name="nationality_emp" id="nationality_emp" class="form-control"
                                value="<?php echo $row['nationality_emp']; ?>" disabled>
                        </div>
                        <br>
                        <div class="col-3">
                            <label for="religion_emp">ศาสนา:</label>
                            <input type="text" name="religion_emp" id="religion_emp" class="form-control"
                                value="<?php echo $row['religion_emp']; ?>" disabled>
                        </div>
                        <br>
                        <div class="col-2">
                            <label for="birthday_emp">วัน/เดือน/ปีเกิด:</label>
                            <input type="text" name="birthday_emp" id="birthday_emp" class="form-control"
                                value="<?php echo $row['birthday_emp']; ?>" disabled>
                        </div>
                        <br>
                        <div class="col-md-2">
                            <label for="status_emp">สถานะพนักงาน:</label>
                            <input type="text" name="status_emp" id="status_emp" class="form-control"
                                value="<?php echo $row['status_emp']; ?>" disabled>
                        </div>
                        <br>
                        <div class="col-md-1">
                            <label for="jobtitle_emp">ตำแหน่ง:</label>
                            <input type="text" name="jobtitle_emp" id="jobtitle_emp" class="form-control"
                                value="<?php echo $row['jobtitle_emp']; ?>" disabled>
                        </div>
                        <br>
                        <div class="col-md-1">
                            <label for="score_emp">คะแนน:</label>
                            <input type="text" name="score_emp" id="score_emp" class="form-control"
                                value="<?php echo $row['score_emp']; ?>" disabled>
                        </div>
                        <br>
                        <div class="col-md-2">
                            <label for="salary_emp">เงินเดือน:</label>
                            <input type="text" name="salary_emp" id="salary_emp" class="form-control"
                                value="<?php echo $row['salary_emp']; ?>" disabled>
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
        <a href="homeHR.php">
            <button class="btn" type="submit" style="background-color: lightblue; color: white;">
                <i class="bi bi-house-door"></i> กลับไปยังหน้าหลัก
            </button>
        </a>
    </center>

</body>