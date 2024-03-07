<link rel="stylesheet" href="customhome.css">

<?php
include('dbconnect.php');
include('login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_emp = $_POST['id_emp'];
    $name_emp = $_POST['name_emp'];
    $pass_emp = $_POST['pass_emp'];
    $id_card_number_emp = $_POST['id_card_number_emp'];
    
    // เพิ่มฟิลด์อื่น ๆ ที่คุณต้องการอัปเดต และใช้คำสั่ง SQL UPDATE เพื่อปรับปรุงข้อมูล
    $sql = "UPDATE employees SET name_emp='$name_emp', pass_emp='$pass_emp', id_card_number_emp='$id_card_number_emp' WHERE id_emp='$id_emp'";
    
    if ($conn->query($sql) === TRUE) {
      if ($conn->query($sql) === TRUE) {
        ?>
        <div class="popup" style="background-color: lightblue;">
            <img src="404-tick.png" ;>
            <h2>บันทึกข้อมูลเสร็จสิ้น</h2>
            <a href="homeHR.php">
                <button type="button" onclick="closePoup()" class="button">
                    กลับไปยังหน้าหลัก</button>
            </a> <!-- You were missing the closing </a> tag -->
        </div>
        <?php
    }
    } else {
        echo "ข้อผิดพลาดในการอัปเดตข้อมูล: " . $conn->error;
        
        // เพิ่มสคริปต์ JavaScript สำหรับแสดงป๊อปอัปหรือแจ้งเตือน
        echo '<script>
                alert("ข้อผิดพลาดในการอัปเดตข้อมูล");
                window.location.href = "homeHR.php"; // ย้ายไปยังหน้าหลัก
              </script>';
    }
    
    $conn->close();
}
?>
