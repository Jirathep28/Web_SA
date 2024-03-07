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
            <h1>แก้ไขข้อมูลพนักงานทั้งหมด</h1>
        </center><br>
    </div>

    <div class="wrapper">


<form method="post" action="HRaddtool.php">

            <div class="row g-3">
            <div class="col-12">
                        <label for="name_emp">ชื่อ-นามสกุล</label>
                        <input type="text" name="name_emp" id="name_emp" class="form-control" 
                        placeholder="ชื่อ-นามสกุล...">
                    </div>
                <br>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="name_emp">รหัสผ่าน:</label>
                        <input type="text" name="pass_emp" id="pass_emp" class="form-control"
                        placeholder="รหัสผ่าน...">
                    </div>
                    <br>
                    <div class="col-md-3">
                        <label for="id_emp">รหัสพนักงาน:</label>
                        <input type="text" name="id_emp" id="id_emp" class="form-control"
                        placeholder="รหัสพนักงาน...">
                    </div>
                    <br>
                    <div class="col-md-3">
                        <label for="id_card_number_emp">เลขบัตรประชาชน:</label>
                        <input type="text" name="id_card_number_emp" id="id_card_number_emp" class="form-control"
                        placeholder="เลขบัตรประชาชน...">
                    </div>
                    <br>
                    <div class="col-10">
                        <label for="email_emp">อีเมล:</label>
                        <input type="text" name="email_emp" id="email_emp" class="form-control"
                        placeholder="อีเมล...">
                    </div>
                    <br>
                    <div class="col-7">
                        <label for="tel_emp">เบอร์โทรศัพท์:</label>
                        <input type="text" name="tel_emp" id="tel_emp" class="form-control"
                        placeholder="เบอร์โทรศัพท์...">
                    </div>
                    <br>
                    <div class="col-12">
                        <label for="tel_emp">ที่อยู่:</label>
                        <input type="text" name="address_emp" id="address_emp" class="form-control"
                        placeholder="ที่อยู่...">
                    <br>
                    <div class="col-2">
                        <label for="nationality_emp">สัญชาติ:</label>
                        <input type="text" name="nationality_emp" id="nationality_emp" class="form-control"
                        placeholder="สัญชาติ...">
                    </div>
                    <br>
                    <div class="col-3">
                        <label for="religion_emp">ศาสนา:</label>
                        <input type="text" name="religion_emp" id="religion_emp" class="form-control"
                        placeholder="ศาสนา...">
                    </div>
                    <br>
                    <div class="col-2">
                        <label for="birthday_emp">วัน/เดือน/ปีเกิด:</label>
                        <input type="text" name="birthday_emp" id="birthday_emp" class="form-control"
                        placeholder="วัน/เดือน/ปีเกิด...">
                    </div>
                    <br>
                    <div class="col-md-2">
                        <label for="status_emp">สถานะพนักงาน:</label>
                        <input type="text" name="status_emp" id="status_emp" class="form-control"
                        placeholder="สถานะพนักงาน...">
                    </div>
                    <br>
                    <div class="col-md-1">
                        <label for="jobtitle_emp">ตำแหน่ง:</label>
                        <input type="text" name="jobtitle_emp" id="jobtitle_emp" class="form-control"
                        placeholder="ตำแหน่ง...">
                    </div>
                    <br>
                    <div class="col-md-1">
                        <label for="score_emp">คะแนน:</label>
                        <input type="text" name="score_emp" id="score_emp" class="form-control"
                        placeholder="คะแนน...">
                    </div>
                    <br>
                    <div class="col-md-2">
                        <label for="salary_emp">เงินเดือน:</label>
                        <input type="text" name="salary_emp" id="salary_emp" class="form-control"
                        placeholder="เงินเดือน...">
                    </div>
                    <br>
                    <div class="col-md-2">
                        <label for="type_emp">แผนก:</label>
                        <input type="text" name="type_emp" id="type_emp" class="form-control"
                        placeholder="แผนก...">
                    </div>
                    <br>
                    <div class="col-md-2">
                        <label for="sum_hour">ชั่วโมงอบรม:</label>
                        <input type="text" name="sum_hour" id="sum_hour" class="form-control"
                        placeholder="ชั่วโมงอบรม...">
                    </div>
                    <!-- เพิ่มฟิลด์อื่น ๆ ตามที่คุณต้องการแก้ไข -->
                    <button type="submit" class="btn btn-primary">เพิ่มพนักงาน</button>
                </form>

                    <br>
                </div>
                

        </div>
    </div>

        <center>
            <a href="homeHR.php">
                <button class="btn" type="submit" style="background-color: lightblue; color: white;  border: 2px solid #007BFF;">
                    <i class="bi bi-house-door"></i> กลับไปยังหน้าหลัก
                </button>
            </a>
        </center>

</body>