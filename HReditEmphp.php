<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="customhome.css">
</head>

<body>

    <?php
    include('dbconnect.php');
    include('login.php');

    $username = $_SESSION['id'];

    // รับข้อมูลจากแบบฟอร์ม
    $email_emp = $_POST["email_emp"];
    $tel_emp = $_POST["tel_emp"];
    $address_emp = $_POST["address_emp"];
    $religion_emp = $_POST["religion_emp"];
    $nationality_emp = $_POST["nationality_emp"];
    $pass_emp = $_POST["pass_emp"];
    $pass_emp2 = $_POST["pass_emp2"];

    // Check if passwords match
    if ($pass_emp === $pass_emp2) {
        // Passwords match, proceed to update the data in the database
        $sql = "UPDATE employees SET email_emp='$email_emp', tel_emp='$tel_emp', address_emp='$address_emp', religion_emp='$religion_emp', pass_emp='$pass_emp',nationality_emp='$nationality_emp' WHERE id_emp = '$username'";

        if ($conn->query($sql) === TRUE) {
            ?>
            <div class="popup">
                <img src="404-tick.png" ;>
                <h2>บันทึกข้อมูลเสร็จสิ้น</h2>
                <a href="homeHR.php">
                    <button type="button" onclick="closePoup()" class = "button">
                        กลับไปยังหน้าหลัก</button>
                </a> <!-- You were missing the closing </a> tag -->
            </div>
            <?php
        }
    } else {
        // Passwords do not match, clear the password fields
        ?>
        <div class="popup2">
            <img src="405-tick.png"  width="100" height="100";>
            <h2>คุณใส่รหัสยืนยันไม่ตรงกัน</h2>
            <a href="HReditem.php">
                <button type="button" onclick="closePoup()" class = "button2">
                    กลับไปยังหน้าแก้ไขข้อมูล</button>
            </a> <!-- You were missing the closing </a> tag -->
        </div>
        <?php
        $pass_emp = "";
        $pass_emp2 = "";
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
    ?>

</body>

</html>