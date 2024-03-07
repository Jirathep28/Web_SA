<link rel="stylesheet" href="customhome.css">

<?php
include('dbconnect.php');
include('login.php');

    $id_emp = $_GET['id_emp'];

    // สร้างคำสั่ง SQL DELETE เพื่อลบข้อมูลพนักงาน
    $sql = "DELETE FROM employees WHERE id_emp = '$id_emp'";
    //$sm = mysqli_query($conn,$sql);
    if ($conn->query($sql) == TRUE) {
        // หากลบข้อมูลเรียบร้อย
        ?>
            <div class="popup">
                <img src="404-tick.png" ;>
                <h2>ลบข้อมูลพนักงานเรียบร้อยแล้ว</h2>
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
                window.location.href = "HReditAll.php"; // ย้ายไปยังหน้าแก้ไขข้อมูล
              </script>';
    }
    $conn->close();

?>
