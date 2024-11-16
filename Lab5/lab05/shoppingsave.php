<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Nguyen Duy Anh Tu" />
    <title>TITLE</title>
</head>

<body>
    <h1>Web Programming - Lab 5</h1>
    <?php 
    umask(0007);
    $dir = "../../data/lab05";
    if (!file_exists($dir)) {
        mkdir($dir, 02770);
    }
    if (isset($_POST["item"]) && isset($_POST["qty"]) && !empty($_POST["item"]) && !empty($_POST["qty"])) { // Kiểm tra xem biểu mẫu đã được gửi (isset) và các trường item và qty không rỗng (!empty).
        $item = $_POST["item"]; // lấy giá trị của item từ dữ liệu biểu mẫu.
        $qty = $_POST["qty"]; // lấy giá trị của qty từ dữ liệu biểu mẫu.
        if (is_numeric($qty) && $qty > 0 && $qty == round($qty)) { //Kiểm tra xem qty có phải là số (is_numeric), lớn hơn 0, và là số nguyên ($qty == round($qty)).
            $filename = "../../data/lab05/shop.txt"; 
            $handle = fopen($filename, "a"); // Mở tệp shop.txt ở chế độ "append" để thêm dữ liệu vào cuối tệp.
            $data = $item . ", " . $qty . "\n"; // Tạo một chuỗi dữ liệu chứa tên sản phẩm, dấu phẩy, số lượng và ký tự xuống dòng.
            fwrite($handle, $data); // Ghi chuỗi dữ liệu vào tệp.
            fclose($handle); // Đóng tệp sau khi ghi.
            echo "<p>Shopping List</p> "; // Hiển thị tiêu đề "Shopping List".
            $handle = fopen($filename, "r"); // Mở lại tệp ở chế độ chỉ đọc ("r") để đọc dữ liệu.
            while (!feof($handle)) { // Vòng lặp đọc từng dòng của tệp cho đến khi kết thúc tệp (feof).
                $data = fgets($handle); // Đọc một dòng từ tệp.
                echo "<p>", $data, "</p>"; // Hiển thị dòng vừa đọc trong một đoạn văn bản HTML.
            }
            fclose($handle); // Đóng tệp sau khi đọc xong.
        } else { //Nếu số lượng không hợp lệ, in ra thông báo lỗi.
            echo "<p>Please enter a valid quantity.</p>";
        }
    } else { // Nếu biểu mẫu chưa được gửi, in ra thông báo yêu cầu người dùng nhập dữ liệu.
        echo "<p>Please enter item and quantity in the input form.</p>";
    }
    ?>
</body>

</html>