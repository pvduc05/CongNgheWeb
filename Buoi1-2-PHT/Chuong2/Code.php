<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>PHT Chương 2 - PHP Căn Bản</title>
</head>

<body>
    <h1>Kết quả PHP Căn Bản</h1>
    <?php
    $ho_ten = "Phương Văn Đức";
    $Diem_tb = 8;
    $co_di_hoc_chuyen_can = true;
    //In ra thông tin
    echo "Họ tên: $ho_ten" . "<br>Điểm: $Diem_tb <br>";

    if ($Diem_tb >= 8.5 && $co_di_hoc_chuyen_can == true) {
        echo "Xếp loai: Giỏi";
    } elseif ($Diem_tb >= 6.5 && $co_di_hoc_chuyen_can == true) {
        echo "Xếp loại: Khá";
    } elseif ($Diem_tb >= 5.0 && $co_di_hoc_chuyen_can == true) {
        echo "Xếp loại: Trung bình";
    } else
        echo "Xếp loại: Yếu (Cần cố gắng thêm!)";

    function chaoMung()
    {

        echo "<br>Chúc mừng bạn đã hoàn thành PHT Chương 2!";
    }
    chaoMung();
    ?>
</body>

</html>