<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả kiểm tra</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Kết quả kiểm tra</h1>
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

    // Lấy 10 câu hỏi và đáp án đúng từ CSDL
    $sql = "SELECT * FROM questions ORDER BY RAND() LIMIT 10";
    $result = $conn->query($sql);

    $correctAnswers = [];
    $score = 0;

    if ($result->num_rows > 0) {
        $index = 0;
        // Lấy các câu trả lời đúng từ cơ sở dữ liệu
        while($row = $result->fetch_assoc()) {
            $index++;
            $correctAnswers[$index] = $row['correct_answer'];
            // Kiểm tra câu trả lời của người dùng
            if (isset($_POST["question{$index}"]) && $_POST["question{$index}"] === $row['correct_answer']) {
                $score++;
            }
        }

        // Hiển thị kết quả
        echo "<div class='alert alert-success text-center'>";
        echo "<p>Bạn đã trả lời đúng <strong>$score</strong>/" . $index . " câu.</p>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger'>Không có câu hỏi trong cơ sở dữ liệu!</div>";
    }

    $conn->close();
    ?>
    <div class="text-center">
        <a href="index.php" class="btn btn-primary">Làm lại</a>
    </div>
</div>
</body>
</html>
