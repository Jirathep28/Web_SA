<?php include('dbconnect.php'); ?>

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
  <link rel="PHP" href="login.php">
  <link rel="PHP" href="dbconnect.php">
  
</head>


<body>
  <style>
body{
    background-image: url("bg05.jpg");
    background-size: 1920px 1080px
}
  </style>



  <form action="login.php" method="post">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>

    <div class="modal modal-sheet position-static d-block  p-5 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
      <div class="modal-dialog" role="document">
        <div class="modal-content rounded-5 shadow">
          <div class="modal-header p-5 pb-4 border-bottom-0">
            <h1>เข้าสู่ระบบ</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body p-5 pt-0">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3"  name="id" placeholder="username" required=""
                style="background-color : rgba(192, 192, 192, 0.315)">
              <label for="id">รหัสพนักงาน</label>
            </div>

            <div class="form-floating mb-3">
              <input type="password" class="form-control rounded-3"  name="pd" placeholder="Password" required=""
                style="background-color : rgba(192, 192, 192, 0.315)">
              <label for="pd">รหัสผ่าน</label>
            </div>


            <button class="w-100 mb-3 btn btn-lg rounded-5 shadow btn-primary my-1" name="submit" type="submit"
              style="background-color : tomato">ยืนยัน</button>

            <small class="text-body-secondary">กดยื่นยันเพื่อเข้าสู่ระบบ หากมีปัญหาติดต่อแผนกสารสนเทศ</small>
            <hr class="my-4">
          </div>
        </div>
      </div>
    </div>
  </form>
</body>

<script>

</script>

</html>