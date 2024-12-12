<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sinh viên</title>
</head>
<body>

<?php
include 'connect.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra sự tồn tại và tính hợp lệ của tham số 'id'
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn sinh viên theo id
    $sql = "SELECT * FROM table_students WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    // Kiểm tra nếu sinh viên tồn tại
    if (!$row) {
        echo "Không tìm thấy sinh viên với ID $id.";
        exit();
    }

    // Xử lý khi người dùng nhấn nút "Sửa"
    if (isset($_POST['edit'])) {
        $fullname = $_POST['fullname'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $hometown = $_POST['hometown'];
        $level = $_POST['level'];
        $group = $_POST['group'];

        // Cập nhật thông tin sinh viên
        $update_sql = "UPDATE table_students SET fullname = '$fullname', dob = '$dob', gender = '$gender', hometown = '$hometown', level = '$level', `group` = '$group' WHERE id = $id";

        if (mysqli_query($conn, $update_sql)) {
            echo "<script>alert('Cập nhật thành công!'); window.location='student.php';</script>";
        } else {
            echo "Lỗi cập nhật: " . mysqli_error($conn);
        }
    }
} else {
    echo "ID không hợp lệ hoặc không được truyền vào.";
    exit();
}
?>

<h1>Sửa thông tin sinh viên: <?php echo $row['fullname']; ?></h1>

<form method="post">
    <p>Họ và tên</p>
    <input type="text" name="fullname" value="<?php echo htmlspecialchars($row['fullname']); ?>" required>

    <p>Ngày sinh</p>
    <input type="date" name="dob" value="<?php echo htmlspecialchars($row['dob']); ?>" required>

    <p>Giới tính</p>
    <label>
        <input type="radio" name="gender" value="1" <?php echo $row['gender'] == 1 ? 'checked' : ''; ?>> Nam
    </label>
    <label>
        <input type="radio" name="gender" value="0" <?php echo $row['gender'] == 0 ? 'checked' : ''; ?>> Nữ
    </label>

    <p>Quê quán</p>
    <input type="text" name="hometown" value="<?php echo htmlspecialchars($row['hometown']); ?>" required>

    <p>Học vấn</p>
    <select name="level" required>
        <option value="0" <?php echo $row['level'] == 0 ? 'selected' : ''; ?>>Tiến sĩ</option>
        <option value="1" <?php echo $row['level'] == 1 ? 'selected' : ''; ?>>Thạc sĩ</option>
        <option value="2" <?php echo $row['level'] == 2 ? 'selected' : ''; ?>>Kỹ sư</option>
        <option value="3" <?php echo $row['level'] == 3 ? 'selected' : ''; ?>>Khác</option>
    </select>

    <p>Nhóm</p>
    <select name="group" required>
        <option value="1" <?php echo $row['group'] == 1 ? 'selected' : ''; ?>>Nhóm 1</option>
        <option value="2" <?php echo $row['group'] == 2 ? 'selected' : ''; ?>>Nhóm 2</option>
        <option value="3" <?php echo $row['group'] == 3 ? 'selected' : ''; ?>>Nhóm 3</option>
    </select>

    <br><br>
    <button name="edit">Cập nhật thông tin</button>
</form>

</body>
</html>