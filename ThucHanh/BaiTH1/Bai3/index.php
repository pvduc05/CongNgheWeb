<?php
// Đường dẫn tới tệp CSV
$filename = "data/65HTTT_Danh_sach_diem_danh.csv";

// Kiểm tra tệp có tồn tại không
if (!file_exists($filename)) {
    die("Tệp CSV không tồn tại!");
}

// Mở tệp CSV
if (($handle = fopen($filename, "r")) !== FALSE) {

    echo "<h2>Danh sách sinh viên</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>Username</th>
            <th>Password</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>City</th>
            <th>Email</th>
            <th>Course</th>
          </tr>";

    // Đọc từng dòng trong CSV
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        // Bỏ qua dòng trống
        if (count($data) < 6) continue;

        // Nếu CSV của bạn có cột số dạng khoa học (2.35E+09), cần format về số
        $username = isset($data[0]) ? $data[0] : '';
        $password = isset($data[1]) ? $data[1] : '';
        $lastname = isset($data[2]) ? $data[2] : '';
        $firstname = isset($data[3]) ? $data[3] : '';
        $city = isset($data[4]) ? $data[4] : '';
        $email = isset($data[5]) ? $data[5] : '';
        $course = isset($data[6]) ? $data[6] : '';

        echo "<tr>
                <td>{$username}</td>
                <td>{$password}</td>
                <td>{$lastname}</td>
                <td>{$firstname}</td>
                <td>{$city}</td>
                <td>{$email}</td>
                <td>{$course}</td>
              </tr>";
    }

    echo "</table>";

    // Đóng tệp
    fclose($handle);
} else {
    echo "Không thể mở tệp CSV!";
}
