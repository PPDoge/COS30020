<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lab05 Task 2 - Sign Guestbook</h1>
    <hr>
    <?php
    umask(0007);
    $dir = "../../data/lab05";
    if (!file_exists($dir)) {
        mkdir($dir, 02770);
    }
    if (isset($_POST["fName"]) && isset($_POST["lName"]) && !empty($_POST["fName"]) && !empty($_POST["lName"])) { // kiểm tra 2 biểu mãu và các trường ko rỗng
        $fName = $_POST["fName"]; // Lấy giá trị của tên từ dữ liệu biểu mẫu và gán chúng cho các biến $fName
        $lName = $_POST["lName"]; // Lấy giá trị của họ từ dữ liệu biểu mẫu và gán chúng cho các biến $lName
        $filename = "../../data/lab05/guestbook.txt";
        $handle = fopen($filename, "a"); // Mở tệp guestbook.txt ở chế độ "append" ("a"), có nghĩa là dữ liệu mới sẽ được thêm vào cuối tệp. Gán "handle" của tệp (một đại diện cho tệp mở) cho biến $handle.

        $data = addslashes($fName . " " . $lName . "\n"); //Tạo một chuỗi dữ liệu $data bằng cách nối tên, họ và một ký tự xuống dòng ("\n"). Sử dụng addslashes() để thêm dấu gạch chéo ngược () trước các ký tự đặc biệt (như dấu nháy đơn, dấu nháy kép) để tránh các vấn đề bảo mật.
        fwrite($handle, $data); // Ghi chuỗi dữ liệu $data vào tệp đã mở ($handle).

        fclose($handle);
        echo "<p style='color:green'>Thank you for signing our guest book!</p>";
    } else { // Nếu biểu mẫu không hợp lệ (tên hoặc họ không được nhập), hiển thị thông báo lỗi yêu cầu người dùng nhập lại.
        echo "<p style='color:red'>You must enter your first and last name!<br>Use the Browser's 'Go Back' button to return to the Guestbook form.</p>";
    }
    echo '<p><a href="guestbookshow.php">Show Guest Book</a></p>';
    ?>
</body>

</html>