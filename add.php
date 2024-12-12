<?php

    include"connect.php";

    if(isset($_POST['add'] ) ) {
        
        $fullname =($_POST['fullname']);

        $dob = $_POST['dob'];

        $gender = ($_POST ['gender']);

        $hometown = ($_POST ['hometown']);

        $level = ($_POST ['level']);

        $group = ($_POST ['group']);

        $sql ="INSERT INTO table_students (fullname, dob, gender, hometown, level,  `group`)
        VALUE('$fullname' , '$dob' , '$gender' , '$hometown' , '$level' ,  '$group')";

        mysqli_query($conn, $sql);

        header('location: student.php');


    }

?>    

<h1>Thêm thông tin sinh viên: </h1>

<form action="add.php" method="post" enctype="multipart/form-data">
    <p>Họ và tên: </p>
    <input type="text" id="fullname" name="fullname" required><br>

    <p>Ngày sinh: </P>
    <input type="date" id="dob" name="dob" required><br>

    <P>Giới tính: </P>
    <input type="radio" id="male" name="gender" value="1">
    <label for="male">Nam</label>
    <input type="radio" id="female" name="gender" value="0">
    <label for="female">Nữ</label><br>

    <P>Quê quán: </p>
    <input type="text" id="hometown" name="hometown" required><br>

    <p>Trình độ học vấn: </p>
    <select name="level" id="level" required>
        <option value="0">Tiến Sĩ</option>
        <option value="1">Thạc Sĩ</option>
        <option value="2">Kỹ Sư</option>
        <option value="3">Khác</option>
    </select><br><br>

    <p>Nhóm: </p>
    <input type="number" id="group" name="group" required><br><br>

    <button id="submit" name="add">Thêm</button>
    
</form>