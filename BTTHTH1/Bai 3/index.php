<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    // Kết nối với cơ sở dữ liệu MySQL
    $servername = "localhost";
    $username = "root"; // Thay bằng tên người dùng CSDL của bạn
    $password = ""; // Thay bằng mật khẩu CSDL của bạn
    $dbname = "student"; // Thay bằng tên cơ sở dữ liệu của bạn

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Lấy dữ liệu sinh viên từ CSDL
    // Sử dụng DISTINCT để đảm bảo không có bản ghi trùng lặp
    $sql = "SELECT DISTINCT id, username, password, lastname, firstname, city, email, course1 FROM students";
    $result = $conn->query($sql);
    ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Danh sách sinh viên</h1>

        <!-- Kiểm tra nếu có dữ liệu trong CSDL -->
        <?php if ($result->num_rows > 0) : ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Duyệt qua kết quả và hiển thị
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";           // Hiển thị ID
                    echo "<td>{$row['username']}</td>";
                    echo "<td>*****</td>"; // Ẩn mật khẩu
                    echo "<td>{$row['lastname']}</td>";
                    echo "<td>{$row['firstname']}</td>";
                    echo "<td>{$row['city']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['course1']}</td>";    // Hiển thị course1
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <?php else : ?>
        <div class="alert alert-warning text-center">
            Không có dữ liệu sinh viên để hiển thị.
        </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    // Đóng kết nối CSDL
    $conn->close();
    ?>
</body>

</html>
