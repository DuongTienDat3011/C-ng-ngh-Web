<?php
include 'config.php'; // Kết nối cơ sở dữ liệu

$id = $_GET['id']; // Lấy ID của hoa cần sửa
$result = $conn->query("SELECT * FROM flowers WHERE id=$id");
$flower = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name']; // Lấy tên hoa từ form
    $description = $_POST['description']; // Lấy mô tả từ form
    $image = $_FILES['image']['name']; // Lấy tên file ảnh

    if ($image) {
        // Nếu có tải ảnh mới, cập nhật file ảnh
        move_uploaded_file($_FILES['image']['tmp_name'], "image" . $image);
        $sql = "UPDATE flowers SET name='$name', description='$description', image='$image' WHERE id=$id";
    } else {
        // Nếu không tải ảnh mới, chỉ cập nhật tên và mô tả
        $sql = "UPDATE flowers SET name='$name', description='$description' WHERE id=$id";
    }

    if ($conn->query($sql)) {
        header("Location: admin.php"); // Quay về trang quản trị
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Sửa Hoa</title>
</head>
<body class="container py-4">
    <h1>Sửa Loài Hoa</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Tên Hoa</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= $flower['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả</label>
            <textarea name="description" id="description" class="form-control" rows="3" required><?= $flower['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình Ảnh (Không bắt buộc)</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="admin.php" class="btn btn-secondary">Quay lại</a>
    </form>
</body>
</html>
