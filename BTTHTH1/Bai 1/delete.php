<?php
include 'config.php'; // Kết nối cơ sở dữ liệu

if (isset($_GET['id'])) {
    $id = $_GET['id']; // Lấy ID của bản ghi cần xóa

    // Xóa bản ghi khỏi bảng flowers
    $result = $conn->query("DELETE FROM flowers WHERE id=$id");

    if ($result) {
        // Reset lại ID để khớp với STT
        $conn->query("SET @num := 0;"); // Khởi tạo biến đếm
        $conn->query("UPDATE flowers SET id = (@num := @num + 1);"); // Reset lại ID liên tục
        $conn->query("ALTER TABLE flowers AUTO_INCREMENT = 1;"); // Cài đặt lại giá trị tự động tăng

        // Chuyển hướng về trang admin
        header("Location: admin.php");
    } else {
        echo "Lỗi khi xóa: " . $conn->error;
    }
} else {
    echo "Không tìm thấy ID!";
}
?>
