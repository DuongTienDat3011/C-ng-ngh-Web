<?php
include 'config.php'; // Kết nối cơ sở dữ liệu

// Lấy danh sách các hoa từ cơ sở dữ liệu
$result = $conn->query("SELECT * FROM flowers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Danh sách Hoa</title>
    <style>
        .flower-item {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .flower-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body class="container py-4">
    <h1 class="mb-4 text-center">Danh sách các loại Hoa</h1>

    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="flower-item">
                    <img src="image<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
                    <h3><?= $row['name'] ?></h3>
                    <p><?= $row['description'] ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
