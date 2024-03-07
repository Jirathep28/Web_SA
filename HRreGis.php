<link rel="stylesheet" href="customhome.css">

<body>

    <center>
    <?php
    // Include the database connection file
    include('dbconnect.php');
    include('login.php'); 
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from the form
        $username = $_SESSION['id'];
        $address = $_POST["address"];
        $country = $_POST["country"];

        // Prepare the SQL statement to insert data into the table 'reg_course_history'
        $sql = "INSERT INTO reg_course_history (id_course, id_emp, reason_rch, status_rch) 
            VALUES ('$country', '$username', '$address', 'รออนุมัติ')";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            ?>
            <div class="popup">
                <img src="404-tick.png" ;>
                <h2>ลงทะเบียนเสร็จสิ้น</h2>
                <a href="homeHR.php">
                    <button type="button" onclick="closePoup()" class = "button">
                        กลับไปยังหน้าหลัก</button>
                </a> <!-- You were missing the closing </a> tag -->
            </div>
            <?php
        }
        

        // Close the database connection
        $conn->close();
    }
    ?>
    </center>

</body>