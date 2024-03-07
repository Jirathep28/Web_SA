<link rel="stylesheet" href="customhome.css">

<?php
include('dbconnect.php');
include('login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_emp = $_POST['id_emp'];
    $pass_emp = $_POST['pass_emp'];
    $email_emp = $_POST['email_emp'];
    $tel_emp = $_POST['tel_emp'];

    $name_emp = $_POST['name_emp'];
    $jobtitle_emp = $_POST['jobtitle_emp'];
    $salary_emp = $_POST['salary_emp'];
    $id_card_number_emp = $_POST['id_card_number_emp'];
    $nationality_emp = $_POST['nationality_emp'];

    $religion_emp = $_POST['religion_emp'];
    $address_emp = $_POST['address_emp'];
    $birthday_emp = $_POST['birthday_emp'];
    $status_emp = $_POST['status_emp'];
    $sum_hour = $_POST['sum_hour'];
    $score_emp = $_POST['score_emp'];
    $type_emp = $_POST['type_emp'];
    
    // เพิ่มฟิลด์อื่น ๆ ที่คุณต้องการเพิ่ม
    // หากต้องการเพิ่ม id_emp ที่มีค่า Auto Increment ในฐานข้อมูล ไม่ต้องระบุค่า id_emp ที่มาจากฟอร์ม

    // สร้างคำสั่ง SQL INSERT INTO เพื่อเพิ่มข้อมูล
    $sql = "INSERT INTO employees (`id_emp`, `pass_emp`, `email_emp`, `tel_emp`
    , `name_emp`, `jobtitle_emp`, `salary_emp`, `id_card_number_emp`, `nationality_emp`
    , `religion_emp`, `address_emp`, `birthday_emp`, `status_emp`, `sum_hour`, `score_emp`, `type_emp` ) 
    VALUES ('$id_emp', '$pass_emp', '$email_emp', '$tel_emp'
    , '$name_emp', '$jobtitle_emp', '$salary_emp', '$id_card_number_emp', '$nationality_emp'
    , '$religion_emp', '$address_emp', '$birthday_emp', '$status_emp', '$sum_hour', '$score_emp', '$type_emp')";

    if ($conn->query($sql) === TRUE) {
        // หากเพิ่มข้อมูลเรียบร้อย
        ?>
            <div class="popup">
                <img src="404-tick.png" ;>
                <h2>เพิ่มข้อมูลพนักงานเรียบร้อยแล้ว</h2>
                <a href="HReditAll.php">
                    <button type="button" onclick="closePoup()" class = "button">
                        กลับไปยังหน้าหลัก</button>
                </a> <!-- You were missing the closing </a> tag -->
            </div>
            <?php
        // ทำการปิดการเชื่อมต่อกับ MySQL
        
    } else {
        echo "ข้อผิดพลาดในการเพิ่มข้อมูล: " . $conn->error;

        // เพิ่มสคริปต์ JavaScript สำหรับแสดงป๊อปอัปหรือแจ้งเตือน
        echo '<script>
                alert("ข้อผิดพลาดในการเพิ่มข้อมูล");
                window.location.href = "HRadd.php"; // ย้ายไปยังหน้าเพิ่มข้อมูล
              </script>';
    }
    $conn->close();
}
?>
