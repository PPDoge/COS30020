<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lab05 Task 2 - Guestbook Show</h1>
    <hr>
    <?php
    $filename = "../../data/lab05/guestbook.txt";
    if (!file_exists($filename)) { //Kiểm tra xem tệp guestbook.txt có tồn tại không bằng hàm file_exists(). Nếu tệp không tồn tại (!file_exists($filename)), hiển thị thông báo "Guestbook is empty!" và kết thúc script bằng exit;.
        echo "<p style='color:red'>Guestbook is empty!</p>";
        exit;
    } else {
        $handle = fopen($filename, "r"); //Mở tệp guestbook.txt ở chế độ chỉ đọc ("r"). Hàm fopen() trả về một "handle" (đại diện cho tệp đã mở), được gán cho biến $handle.

        $data = ""; //Khởi tạo một biến $data (kiểu chuỗi) để lưu trữ toàn bộ nội dung của tệp.
        while (!feof($handle)) { //Vòng lặp while sẽ tiếp tục đọc từng dòng của tệp cho đến khi gặp dấu hiệu kết thúc tệp (End-Of-File - EOF). feof($handle): Hàm này kiểm tra xem con trỏ tệp đã đến cuối tệp hay chưa.
            $temp = stripslashes(fgets($handle)); //fgets($handle): Đọc một dòng từ tệp (kết thúc bằng ký tự xuống dòng \n). stripslashes($temp): Loại bỏ các dấu gạch chéo ngược đã được thêm vào trước đó bằng addslashes() (trong guestbooksave.php) để tránh các vấn đề bảo mật.
            $data .= $temp; //Nối dòng vừa đọc ($temp) vào cuối chuỗi $data.
        }

        echo "<p style='color:green'>Guest book entries:</p>";
        echo "<pre style=\"font-family: 'Times New Roman', Times, serif;\">$data</pre>";
        fclose($handle);
    }
    ?>
</body>

</html>