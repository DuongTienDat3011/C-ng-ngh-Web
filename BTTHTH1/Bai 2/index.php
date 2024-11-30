<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài kiểm tra trắc nghiệm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Bài kiểm tra trắc nghiệm</h1>
    <form action="result.php" method="POST">
        <?php
        // Kết nối đến CSDL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "quiz_db";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Lấy 10 câu hỏi ngẫu nhiên
        $sql = "SELECT * FROM questions ORDER BY RAND() LIMIT 10";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $index = 0;
            // Hiển thị các câu hỏi
            while($row = $result->fetch_assoc()) {
                $index++;
                echo "<div class='card mb-4'>";
                echo "<div class='card-header'><strong>Câu $index: {$row['question']}</strong></div>";
                echo "<div class='card-body'>";
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='question{$index}' value='A' id='question{$index}A' required>";
                echo "<label class='form-check-label' for='question{$index}A'>{$row['option_a']}</label>";
                echo "</div>";
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='question{$index}' value='B' id='question{$index}B' required>";
                echo "<label class='form-check-label' for='question{$index}B'>{$row['option_b']}</label>";
                echo "</div>";
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='question{$index}' value='C' id='question{$index}C' required>";
                echo "<label class='form-check-label' for='question{$index}C'>{$row['option_c']}</label>";
                echo "</div>";
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='question{$index}' value='D' id='question{$index}D' required>";
                echo "<label class='form-check-label' for='question{$index}D'>{$row['option_d']}</label>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Không có câu hỏi trong cơ sở dữ liệu!</div>";
        }

        $conn->close();
        ?>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </div>
    </form>
</div>
</body>
</html>
