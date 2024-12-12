<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #ffe4e1;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            padding: 20px;
        }
        .header {
            background-color: #4caf50;
            color: #fff;
            text-align: center;
            padding: 15px 0;
            font-size: 24px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #4caf50;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f8c7cc;
        }
        .buttons {
            text-align: center;
            margin: 20px 0;
        }
        .buttons button {
            background-color: #d63384;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 5px;
        }
        .buttons button:hover {
            background-color: #45a049;
        }
        .action-links a {
            margin: 0 5px;
            color: #007bff;
            text-decoration: none;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Danh sách sinh viên</h1>

    <form method="POST" action="search.php">
        <button type="submit" name="timkiem">Tìm kiếm</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Quê quán</th>
                <th>Trình độ</th>
                <th>Nhóm</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include "connect.php";

            $sql = "SELECT * FROM table_students";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['fullname'] ?></td>
                <td><?php echo $row['dob'] ?></td>
                <td><?php echo $row['gender'] == 1 ? "Nam" : "Nữ"; ?></td>
                <td><?php echo $row['hometown'] ?></td>
                <td><?php  if ($row['level'] == 0) {
                            echo "Tiến sĩ";
                        } else if ($row['level'] == 1) {
                            echo "Thạc sĩ";
                        } else if ($row['level'] == 2) {
                            echo "Kỹ sư";
                        } else if ($row['level'] == 3) {
                            echo "Khác";
                        }       
                        ?> </td>
                <td><?php echo $row['group'] ?></td>
                <td class="edit-delete">
                    <a href="delete.php?id=<?php echo intval($row['id']); ?>">Xóa</a>
                    <a href="edit.php?id=<?php echo intval($row['id']); ?>">Sửa</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="add.php">
        <button>Thêm Sinh viên</button>
    </a>
</body>
</html>
