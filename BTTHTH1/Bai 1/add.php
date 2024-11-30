<?php
include 'config.php'; // Kết nối cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name']; // Lấy tên hoa từ form
    $description = $_POST['description']; // Lấy mô tả từ form
    $image = $_FILES['image']['name']; // Lấy tên file ảnh

    // Di chuyển file ảnh vào thư mục images/
    if (move_uploaded_file($_FILES['image']['tmp_name'], "image" . $image)) {
        // Thêm dữ liệu vào cơ sở dữ liệu
        $sql = "INSERT INTO flowers (name, description, image) VALUES ('$name', '$description', '$image')";
        if ($conn->query($sql)) {
            header("Location: admin.php"); // Quay về trang quản trị
        } else {
            echo "Lỗi: " . $conn->error;
        }
    } else {
        echo "Lỗi khi tải ảnh.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Thêm Hoa</title>
</head>
<body class="container py-4">
    <h1>Thêm Loài Hoa</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Tên Hoa</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình Ảnh</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
        <a href="admin.php" class="btn btn-secondary">Quay lại</a>
    </form>
</body>
</html>
